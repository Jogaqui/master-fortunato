<?php

namespace App\Http\Controllers;
use App\Models\Detalle;
use App\Models\Comanda;
use App\Models\Comida;
use App\Models\Categoria;
use App\Models\Mesa;

use Illuminate\Http\Request;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const PAG = 5;
    public function index(Request $request)
    {
        $buscarpor = $request->get('idcomanda');
        $detalle = Detalle::where('estado','=','1')->where('idcomanda','like','%'.$buscarpor.'%')->paginate($this::PAG);
        $comanda = Comanda::where('estado','=','1')->get();
        $mesa = Mesa::where('estado','=','1')->get();
        return view('detalle.index',compact('detalle','buscarpor','comanda','mesa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalle = Detalle::where('estado','=','1')->get();
        $comanda = Comanda::where('estado','=','1')->get();
        $comida = Comida::where('estado','=','1')->get();
        $categoria = Categoria::where('estado','=','1')->get();
        return view('detalle.create',compact('detalle','comanda','comida','categoria'));
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
            //'nombreComida'=>'required|max:30|unique:comidas',
            //'precio'=>'required|min:0',
        ],[
            //'nombreComida.required'=>'Ingrese nombre de la comida!!!',
            //'nombreComida.max'=>'El nombre debe tener máximo 30 caracteres!!!',
            //'nombreComida.unique'=>'El nombre ya existe!!!',
            //'precio.required'=>'Ingrese precio de la comida!!!',
            //'precio.min'=>'El precio debe ser mayor a 0!!!'
        ]);
        $detalle = new Detalle();
        $detalle->cantidad = $request->cantidad;
        $detalle->observacion = $request->observacion;
        $detalle->idcomanda = $request->idcomanda;
        $detalle->idcomida = $request->idcomida;
        $detalle->estado = '1';
        $detalle->save();
        return redirect()->route('detalle.index')->with('datos','¡Registro guardado!');
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
        $detalle = Detalle::findOrFail($id);
        $comanda = Comanda::where('estado','=','1')->get();
        $comida = Comida::where('estado','=','1')->get();
        return view('detalle.edit', compact('detalle','comanda','comida'));
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
            // 'nombreComida'=>'required|max:30',
            // 'precio'=>'required|min:0',
         ],[
            // 'nombreComida.required'=>'Ingrese nombre de la comida!!!',
            // 'nombreComida.max'=>'El nombre debe tener máximo 30 caracteres!!!',
            // 'precio.required'=>'Ingrese precio de la comida!!!',
            // 'precio.min'=>'El precio debe ser mayor a 0!!!'
         ]);
         $detalle = Detalle::findOrFail($id);
         $detalle->cantidad = $request->cantidad;
         $detalle->observacion = $request->observacion;
         $detalle->idcomanda = $request->idcomanda;
         $detalle->idcomida = $request->idcomida;
         $detalle->estado = '1';
         $detalle->save();
         return redirect()->route('detalle.index')->with('datos','¡Registro actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle = Detalle::findOrFail($id);
        $detalle->estado='0';
        $detalle->save();
        return redirect()->route('detalle.index')->with('datos','¡Registro eliminado!');
    }
}
