<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

use App\Empresa;
use Spatie\Permission\Models\Role;
use Jenssegers\Date\Date;

class EmpresaController extends Controller
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
        $this->authorize('view', $empresa = new Empresa);
        $empresa = new Empresa;

        return view('admin.empresas.index', [
            'empresas' => $empresa->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $this->authorize('create', $empresa = new Empresa);

       return view('admin.empresas.create', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Empresa);

        $this->validate($request, ['nombre' => 'required|min:3|max:255', 'email' => 'required|string|email|max:255|unique:empresas']);

        /*$post = Post::create($request->only('titulo'));*/
        $empresa = Empresa::create([
            'nombre' => $request->nombre,
            'leyenda' => $request->leyenda,
            'leyenda_factura' => $request->leyenda_factura,
            'cuit' => $request->cuit,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'responsable' => $request->responsable,
            'user_id' => auth()->user()->id,
            ]);

            return redirect()->route('admin.empresas.index')->with('flash', 'ha sido creado con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        $this->authorize('update', $empresa);

        return view('admin.empresas.edit', [
            'empresa' => $empresa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Empresa $empresa, Request $request)
    {
        $this->authorize('update', $empresa);

        $this->validate($request, ['nombre' => 'required|min:3|max:255', 'email' => 'required', Rule::unique('empresa')->ignore($empresa->id)]);

        try {
            $empresa->update([
                'nombre' => $request->nombre,
                'leyenda' => $request->leyenda,
                'leyenda_factura' => $request->leyenda_factura,
                'cuit' => $request->cuit,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'responsable' => $request->responsable,
                ]);

            return redirect()->route('admin.empresas.index')->with('flash', 'ha sido modificado con exito');

        } catch (\Throwable $th) {

            return redirect()->route('admin.empresas.edit', $empresa)->with('danger', 'hubo un error al actualizar '.$th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
       $this->authorize('delete', $empresa);

        try {
            //se elimina el sector
            $empresa->delete();

            return redirect()->route('admin.empresas.index')->with('flash', 'ha sido eliminada con exito');
        } catch (\Throwable $th) {

            return redirect()->route('admin.empresas.edit', $empresa)->with('danger', 'hubo un error al eliminar '.$th->getMessage());

        }
    }

    public function timelineshow()
    {

        return view('admin.empresas.timeline',[
            'empresas' => Empresa::all(),
            'roles' => Role::all()

        ]);
    }
}
