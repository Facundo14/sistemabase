<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\SaveRolesRequest;
use App\Http\Controllers\Controller;

class RolesController extends Controller
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
    public function index()
    {
        $this->authorize('view', $role = new Role);

        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $this->authorize('create', $role = new Role);
       
       return view('admin.roles.create', [
            'role' => $role,
            'permissions' => Permission::all()
            /*'permissions' => Permission::pluck('name', 'id', 'displayname')*/
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        $this->authorize('create', new Role);

      /*$data = $request->validate([
        'name' => 'required|unique:roles',
        'display_name' => 'required'
      ],*/
      /*Siguiente linea sirve para personalizar los mensajes de error*/
        /*[
            'name.required' => 'El campo identificador es obligatorio.',
            'name.unique' => 'Este identificador ya ha sido registrado.',
            'display_name.required' => 'El campo nombre es obligatorio.'
        ]
    );*/

      $role = Role::create($request->validated());

      if ($request->has('permissions')) 
      {
          $role->givePermissionTo($request->permissions);
      }

      return redirect()->route('admin.roles.index')->withFlash('El rol fué creado correctamente');
      
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()/*
            'permissions' => Permission::pluck('name', 'id', 'displayname')*/
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        /*$data = $request->validate([
        'display_name' => 'required'],
        Siguiente linea sirve para personalizar los mensajes de error
        [
            'display_name.required' => 'El campo nombre es obligatorio.'
        ]
        );*/

        $role->update($request->validated());

        $role->permissions()->detach();

        if ($request->has('permissions')) 
        {
          $role->givePermissionTo($request->permissions);
        }

      return redirect()->route('admin.roles.edit', $role)->withFlash('El rol fué actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        try {
            //se elimina el sector
            $role->delete();

            return redirect()->route('admin.roles.index')->with('flash', 'El rol ha sido eliminada con exito');
        } catch (\Throwable $th) {
            if ($th->getCode()==23000) {
                return redirect()->route('admin.roles.index')->with('danger', 'No se puede eliminar, pertenece a otra tabla; Codigo de error: '.$th->getCode());
            }
            else {
                return redirect()->route('admin.roles.index')->with('danger', 'hubo un error al eliminar '.$th->getMessage().'Codigo de error: '.$th->getCode());
            }
            
        }
    }
}
