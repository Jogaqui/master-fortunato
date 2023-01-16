@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Crear Comanda</h5>
</div>
<div class="card-body table-border-style">
    <form method="POST" action="{{route('comanda.store')}}">
        @csrf
        <div class="mb-3">
            <label for="idcliente" class="form-label">Cliente:</label>
            <select class="form-control" name="idcliente" id="idcliente">
                @foreach($cliente as $item)
                <option value="{{$item['idcliente']}}">{{$item['nombres']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="idmesa" class="form-label">Mesa:</label>
            <select class="form-control" name="idmesa" id="idmesa">
                @foreach($mesa as $item)
                <option value="{{$item['idmesa']}}">{{$item['ubicacion']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id" class="form-label">Mozo:</label>
            <select class="form-control" name="id" id="id">
                @foreach($user as $item)
                <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Fecha:</label>
            <input type="datetime-local" class="form-control " id="fecha" name="fecha">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
        <a href="{{route('comanda.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"> Cancelar</i></a>
    </form>
</div>
@endsection