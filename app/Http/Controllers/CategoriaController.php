<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\Categoria\StoreRequest;
use App\Http\Requests\Categoria\UpdateRequest;

class CategoriaController extends Controller
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
        //$this->authorize('view', $empresa = new Empresa);
        $categoria = new Categoria;

        return view('categorias.index', [
            'categorias' => $categoria->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create', $empresa = new Empresa);

        return view('categorias.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //$this->authorize('create', new Empresa);

        $categoria = Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('flash', 'ha sido creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        $this->authorize('update', $categoria);

        return view('categorias.edit', [
            'categoria' => $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Categoria $categoria)
    {
        $this->authorize('update', $categoria);

        try {
            $categoria->update($request->all());

            return redirect()->route('categorias.index')->with('flash', 'ha sido modificado con exito');

        } catch (\Throwable $th) {

            return redirect()->route('categorias.edit', $categoria)->with('danger', 'hubo un error al actualizar '.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $this->authorize('delete', $categoria);

        try {
            //se elimina el sector
            $categoria->delete();

            return redirect()->route('categorias.index')->with('flash', 'ha sido eliminada con exito');
        } catch (\Throwable $th) {

            return redirect()->route('categorias.edit', $categoria)->with('danger', 'hubo un error al eliminar '.$th->getMessage());

        }
    }
}
