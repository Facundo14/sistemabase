<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Response;
use App\Pais;
use View;

class PaisController extends Controller
{
    protected $rules =
    [
        'name' => 'required|min:2|max:32',
        'shortname' => 'required|min:2|max:4'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::orderBy('id', 'desc')->get();

        return view('admin.paises.index', ['paises' => $paises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $pais = new Pais();
            $pais->name = $request->name;
            $pais->shortname = $request->shortname;
            $pais->save();
            return response()->json($pais);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $pais = Pais::findOrFail($id);
            $pais->name = $request->name;
            $pais->shortname = $request->shortname;
            $pais->save();
            return response()->json($pais);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pais $pais)
    {
        $this->authorize('delete', $pais);

        try {
            //se elimina el sector
            
            $pais->delete();

            return redirect()->route('admin.paises.index')->with('flash', 'El rol ha sido eliminada con exito');
        } catch (\Throwable $th) {
            if ($th->getCode()==23000) {
                return redirect()->route('admin.paises.index')->with('danger', 'No se puede eliminar, pertenece a otra tabla; Codigo de error: '.$th->getCode());
            }
            else {
                return redirect()->route('admin.paises.index')->with('danger', 'hubo un error al eliminar '.$th->getMessage().'Codigo de error: '.$th->getCode());
            }
            
        }
    }
}
