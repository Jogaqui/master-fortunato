<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
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
        $cliente = Cliente::where('estado','=','1')->where('apellidos','like','%'.$buscarpor.'%')->paginate($this::PAG);
        return view('cliente.index',compact('cliente','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
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
            'apellidos'=>'required|max:30',
            'nombres'=>'required|max:30',
            'dni'=>'required|min:8|max:8|unique:clientes',
            'telefono'=>'required|min:6|max:10',
            'email'=>'required|max:30|unique:clientes'
        ],[
            'apellidos.required'=>'Ingrese apellido del cliente!!!',
            'apellidos.max'=>'Los apellidos debe tener máximo 30 caracteres!!!',
            'nombres.required'=>'Ingrese nombres del clinete!!!',
            'nombres.max'=>'Los nombres debe tener máximo 30 caracteres!!!',
            'dni.required'=>'Ingrese DNI del cliente!!!',
            'dni.min'=>'El DNI debe tener 8 digitos!!!',
            'dni.max'=>'El DNI debe tener 8 digitos!!!',
            'dni.unique'=>'El DNI ya está registrado!!!',
            'telefono.required'=>'Ingrese teléfono del cliente!!!',
            'telefono.min'=>'El teléfono debe tener mínimo 6 digitos!!!',
            'telefono.max'=>'El teléfono debe tener máximo 10 digitos!!!',
            'email.required'=>'Ingrese email del cliente!!!',
            'email.max'=>'El email debe tener máxmimo 30 caracteres',
            'email.unique'=>'El email ya está registrado'
        ]);
        $cliente = new Cliente();
        $cliente->apellidos = $request->apellidos;
        $cliente->nombres = $request->nombres;
        $cliente->dni = $request->dni;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->estado = '1';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','¡Registro guardado!');
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
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
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
            'apellidos'=>'required|max:30',
            'nombres'=>'required|max:30',
            'dni'=>'required|min:8|max:8',
            'telefono'=>'required|min:6|max:10',
            'email'=>'required|max:30'
        ],[
            'apellidos.required'=>'Ingrese apellido del cliente!!!',
            'apellidos.max'=>'Los apellidos debe tener máximo 30 caracteres!!!',
            'nombres.required'=>'Ingrese nombres del clinete!!!',
            'nombres.max'=>'Los nombres debe tener máximo 30 caracteres!!!',
            'dni.required'=>'Ingrese DNI del cliente!!!',
            'dni.min'=>'El DNI debe tener 8 digitos!!!',
            'dni.max'=>'El DNI debe tener 8 digitos!!!',
            'telefono.required'=>'Ingrese teléfono del cliente!!!',
            'telefono.min'=>'El teléfono debe tener mínimo 6 digitos!!!',
            'telefono.max'=>'El teléfono debe tener máximo 10 digitos!!!',
            'email.required'=>'Ingrese email del cliente!!!',
            'email.max'=>'El email debe tener máxmimo 30 caracteres',
        ]);
        $cliente = Cliente::findOrFail($id);
        $cliente->apellidos = $request->apellidos;
        $cliente->nombres = $request->nombres;
        $cliente->dni = $request->dni;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->estado = '1';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','¡Registro actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->estado='0';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','¡Registro eliminado!');
    }

    public function confirmar($id) {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.confirmar',compact('cliente'));
    }
}
