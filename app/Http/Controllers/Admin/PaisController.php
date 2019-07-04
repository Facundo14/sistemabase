<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pais;
use Response;
use Session;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', $pais = new Pais);

        $data['paises'] = Pais::all();

        return view('admin.paises.index',$data);
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
       $pais = new Pais([
            'pais' => $request->post('txtNombre')
        ]);
        $pais->save();
        Session::flash('success','Agregado correctamente');
        return Response::json($pais);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $pais  = Pais::where($where)->first();

        return Response::json($pais);
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
        $pais = Pais::find($request->post('hdnPaisId'));
        $pais->pais = $request->post('txtNombre');
        $pais->update();
        Session::flash('success','Editado correctamente');
        return Response::json($pais);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->authorize('delete', $pais = new Pais);
        $pais = Pais::find($id);

        if (is_null ($pais))
        {
            App::abort(404);
        }
        $pais->delete();
        return redirect()->route('admin.paises.index')->with('flash', 'Eliminado con exito');

    }
}
