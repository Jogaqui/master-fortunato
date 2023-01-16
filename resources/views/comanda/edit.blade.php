@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Editar Comida</h5>
</div>
<div class="card-body table-border-style">
    <form method="POST" action="{{route('comanda.update',$comanda->idComanda)}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{$comanda->idComanda}}" disabled>
        </div>
        <div class="mb-3">
            <label for="idcliente" class="form-label">Cliente:</label>
            <select class="form-control" name="idcliente" id="idcliente">
                @foreach($cliente as $item)
                <option value="{{$item['idcliente']}}" {{$item->idcliente == $cliente->idcliente ? 'selected' : ''}}>{{$item['nombres']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="idmesa" class="form-label">Mesa:</label>
            <select class="form-control" name="idmesa" id="idmesa">
                @foreach($mesa as $item)
                <option value="{{$item['idmesa']}}" {{$item->idmesa == $mesa->idmesa ? 'selected' : ''}}>{{$item['idmesa']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id" class="form-label">Usuario:</label>
            <select class="form-control" name="id" id="id">
                @foreach($user as $item)
                <option value="{{$item['id']}}" {{$item->id == $user->id ? 'selected' : ''}}>{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Actualizar</button>
        <a href="{{route('comanda.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
    </form>
</div>
@endsection