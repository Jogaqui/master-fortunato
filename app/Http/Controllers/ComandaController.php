<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use App\Models\Cliente;
use App\Models\Mesa;
use App\Models\User;
use App\Models\Detalle;

class ComandaController extends Controller
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
        $comanda = Comanda::where('estado','=','1')->where('idcliente','like','%'.$buscarpor.'%')->paginate($this::PAG);
        return view('comanda.index',compact('comanda','buscarpor'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comanda = Comanda::where('estado','=','1')->get();
        $cliente = Cliente::where('estado','=','1')->get();
        $mesa = Mesa::where('estado','=','1')->get();
        $user = User::all();
        return view('comanda.create',compact('comanda','cliente','mesa','user'));
    }



    public function reporte($id)
    {
        $comanda = Comanda::findOrFail($id);
        $cliente = Cliente::where('estado','=','1')->get();
        $mesa = Mesa::where('estado','=','1')->get();
        $user = User::all();

        return view('comanda.reporte', compact('comanda','cliente','mesa','user'));
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
        $comanda = new Comanda();
        $comanda->idcliente = $request->idcliente;
        $comanda->idMesa = $request->idMesa;
        $comanda->id = $request->id;
        $comanda->fecha = $request->fecha;
        $comanda->estado = '1';
        $comanda->save();
        return redirect()->route('comanda.index')->with('datos','¡Registro guardado!');
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
        $comanda = Comanda::findOrFail($id);
        $cliente = Cliente::where('estado','=','1')->get();
        $mesa = Mesa::where('estado','=','1')->get();
        $user = User::all();
        return view('comanda.edit', compact('comanda','cliente','mesa','user'));
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
        $comanda = Comanda::findOrFail($id);
        $comanda->idcliente = $request->idcliente;
        $comanda->idmesa = $request->idmesa;
        $comanda->id = $request->id;
        $comanda->fecha = $request->fecha;
        $comanda->estado = '1';
        $comanda->save();
        return redirect()->route('comanda.index')->with('datos','¡Registro actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comanda = Comanda::findOrFail($id);
        $comanda->estado='0';
        $comanda->save();
        return redirect()->route('comanda.index')->with('datos','¡Registro eliminado!');
    }

    public function confirmar($id) {
        $comanda = Comanda::findOrFail($id);
        $cliente = Cliente::where('estado','=','1')->get();
        $mesa = Mesa::where('estado','=','1')->get();
        $user = User::all();
        return view('comanda.confirmar', compact('comanda','cliente','mesa','user'));
    }
}
