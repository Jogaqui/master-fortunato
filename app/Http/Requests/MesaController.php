<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAG = 5;
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $mesa = Mesa::where('estado','=','1')->where('ubicacion','like','%'.$buscarpor.'%')->paginate($this::PAG);
        return view('mesa.index',compact('mesa','buscarpor'));
    }


    public function indexMozo(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $mesa = Mesa::where('estado','=','1')->where('ubicacion','like','%'.$buscarpor.'%')->paginate($this::PAG);
        return view('mesa.indexMozo',compact('mesa','buscarpor'));
    }


    public function byProject($id){
        return   Mesa::where('idmesa',$id)->get();
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mesa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'ubicacion'=>'required|max:30|unique:mesas',
            'capacidad'=>'required|integer|min:1'
        ],[
            'ubicacion.required'=>'Ingrese ubicación de la mesa!!!',
            'ubicacion.max'=>'La ubicación debe tener máximo 30 caracteres!!!',
            'ubicacion.unique'=>'Ya existe está ubicación!!!',
            'capacidad.required'=>'Ingrese capacidad de la mesa!!!',
            'capacidad.integer'=>'La capacidad debe ser entero!!!',
            'capacidad.min'=>'La capacidad no puede ser menor a 1!!!'
        ]);
        $mesa = new Mesa();
        $mesa->ubicacion = $request->ubicacion;
        $mesa->capacidad = $request->capacidad;
        $mesa->estado = '1';
        $mesa->save();
        return redirect()->route('mesa.index')->with('datos','¡Registro guardado!');
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
        $mesa = Mesa::findOrFail($id);
        return view('mesa.edit', compact('mesa'));
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
        $data = request()->validate([
            'ubicacion'=>'required|max:30',
            'capacidad'=>'required|integer'
        ],[
            'ubicacion.required'=>'Ingrese ubicación de la mesa!!!',
            'ubicacion.max'=>'La ubicación debe tener máximo 30 caracteres!!!',
            'capacidad.required'=>'Ingrese capacidad de la mesa!!!',
            'capacidad.integer'=>'La capacidad debe ser entero!!!'
        ]);
        $mesa = Mesa::findOrFail($id);
        $mesa->ubicacion = $request->ubicacion;
        $mesa->capacidad = $request->capacidad;
        $mesa->save();
        return redirect()->route('mesa.index')->with('datos','¡Registro guardado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mesa = Mesa::findOrFail($id);
        $mesa->estado='0';
        $mesa->save();
        return redirect()->route('mesa.index')->with('datos','¡Registro eliminado!');
    }

    public function confirmar($id) {
        $mesa = Mesa::findOrFail($id);
        return view('mesa.confirmar',compact('mesa'));
    }
}
