<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use App\User;
use App\Puesto;
use App\PrioridadUsuario;
use App\Events\UsuarioFueCreado;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = Auth::user();
        if ($user->hasRole('Admin')) {
            $users = User::permitido()->get();
        }
        else {
           $users = User::permitido()->activo()->get();
        }

        //$users = Post::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user  = new User;

        $this->authorize('create', $user);

        $roles = Role::with('permissions')->get();

        $permissions = Permission::all();

       /* $permissions = Permission::pluck('name', 'id', 'display_name');*/

        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $this->authorize('create', $user);

        //Validamos el formulario
        $data = $request->validate([
            'username' => 'required|string|min:5|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dni' => 'required|string|max:8|unique:users',
            'foto' => 'mimes:jpeg,jpg,png|max:1000'
        ]);

        //Generamos una contraseña (para email)
        //$data['password'] = str_random(8);

        //Creamos el usuario
        $user = User::create($data);
        //Asignamos roles
        $user->assignRole($request->roles);
        //Asignamos permisos
        $user->givePermissionTo($request->permissions);

        //Enviamos el email con evento y el listener
        //UsuarioFueCreado::dispatch($user, $data['password']);

        //Regresamos al usuario
        return redirect()->route('admin.users.index')->withFlash('El usuario se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();

        $permissions = Permission::all();
        /*
        $permissions = Permission::pluck('name', 'id', 'display_name');*/

        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {

        $this->authorize('update', $user);

        $rules = [
            'username' => ['required', Rule::unique('users')->ignore($user->id),],
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'dni' => ['required', Rule::unique('users')->ignore($user->id),]
        ];

        if ($request->filled('password')) {
            $rules['password'] = ['confirmed', 'min:6'];
        }

        if($request->file('foto'))
        {
            $user->foto =  $request->file('foto')->store('profile');
        }
        $user->update($request->validate($rules));

        return back()->with('flash', 'El usuario ha sido actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        try {
            //se elimina el sector
            $user->update(['condicion' => false]);

            return redirect()->route('admin.users.index')->with('flash', 'El usuario ha sido dado de baja con exito');
        } catch (\Throwable $th) {
            if ($th->getCode()==23000) {
                return redirect()->route('admin.users.index')->with('danger', 'No se puede dar de baja, pertenece a otra tabla; Codigo de error: '.$th->getCode());
            }
            else {
                return redirect()->route('admin.users.index')->with('danger', 'hubo un error al dar de baja '.$th->getMessage().'Codigo de error: '.$th->getCode());
            }

        }
    }

    public function activar(User $user)
    {
        $this->authorize('activar', $user);

        $user->update(['condicion' => true]);

        return redirect()->route('admin.users.index')->with('flash', 'El usuario ha sido dado de alta con exito');
    }
}
