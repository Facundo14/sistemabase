<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provincia;
use Response;
use Session;

class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', $provincia = new Provincia);

        $data['provincias'] = Provincia::all();

        return view('admin.provincias.index',$data);
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
        $provincia = new Provincia([
            'provincia' => $request->post('txtNombre')
        ]);
        $provincia->save();
        Session::flash('success','Agregado correctamente');
        return Response::json($provincia);
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
        $where = array('id' => $id);
        $provincia  = Provincia::where($where)->first();

        return Response::json($provincia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $provincia = Provincia::find($request->post('hdnProvinciaId'));
        $provincia->provincia = $request->post('txtNombre');
        $provincia->update();
        Session::flash('success','Editado correctamente');
        return Response::json($provincia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $provincia = new Provincia);
        $provincia = Provincia::find($id);

        if (is_null ($provincia))
        {
            App::abort(404);
        }
        $provincia->delete();
        return redirect()->route('admin.paises.index')->with('flash', 'Eliminado con exito');
    }
}
