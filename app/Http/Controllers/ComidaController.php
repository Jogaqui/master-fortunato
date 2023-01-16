<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comida;
use App\Models\Categoria;

class ComidaController extends Controller
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
        $comida = Comida::where('estado','=','1')->where('nombreComida','like','%'.$buscarpor.'%')->paginate($this::PAG);
        return view('comida.index',compact('comida','buscarpor'));
    }

    public function byProject($id){
      return   Comida::where('idcategoria',$id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comida = Comida::where('estado','=','1')->get();
        $categoria = Categoria::where('estado','=','1')->get();
        return view('comida.create',compact('comida','categoria'));
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
            'nombreComida'=>'required|max:30|unique:comidas',
            'precio'=>'required|min:0',
        ],[
            'nombreComida.required'=>'Ingrese nombre de la comida!!!',
            'nombreComida.max'=>'El nombre debe tener máximo 30 caracteres!!!',
            'nombreComida.unique'=>'El nombre ya existe!!!',
            'precio.required'=>'Ingrese precio de la comida!!!',
            'precio.min'=>'El precio debe ser mayor a 0!!!'
        ]);
        $comida = new Comida();
        $comida->nombreComida = $request->nombreComida;
        $comida->precio = $request->precio;
        $comida->idcategoria = $request->idcategoria;
        $comida->estado = '1';
        $comida->save();
        return redirect()->route('comida.index')->with('datos','¡Registro guardado!');
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
        $comida = Comida::findOrFail($id);
        $categoria = Categoria::where('estado','=','1')->get();
        return view('comida.edit', compact('comida','categoria'));
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
            'nombreComida'=>'required|max:30',
            'precio'=>'required|min:0',
        ],[
            'nombreComida.required'=>'Ingrese nombre de la comida!!!',
            'nombreComida.max'=>'El nombre debe tener máximo 30 caracteres!!!',
            'precio.required'=>'Ingrese precio de la comida!!!',
            'precio.min'=>'El precio debe ser mayor a 0!!!'
        ]);
        $comida = Comida::findOrFail($id);
        $comida->nombreComida = $request->nombreComida;
        $comida->precio = $request->precio;
        $comida->idcategoria = $request->idcategoria;
        $comida->estado = '1';
        $comida->save();
        return redirect()->route('comida.index')->with('datos','¡Registro actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comida = Comida::findOrFail($id);
        $comida->estado='0';
        $comida->save();
        return redirect()->route('comida.index')->with('datos','¡Registro eliminado!');
    }

    public function confirmar($id) {
        $comida = Comida::findOrFail($id);
        $categoria = Categoria::where('estado','=','1')->get();
        return view('comida.confirmar', compact('comida','categoria'));
    }
}
