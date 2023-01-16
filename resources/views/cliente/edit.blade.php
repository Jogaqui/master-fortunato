@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Editar Cliente</h5>
</div>
<div class="card-body table-border-style">
    <form method="POST" action="{{route('cliente.update',$cliente->idcliente)}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{$cliente->idcliente}}" disabled>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos:</label>
            <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{$cliente->apellidos}}">
            @error('apellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres:</label>
            <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="{{$cliente->nombres}}">
            @error('nombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI:</label>
            <input type="number" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{$cliente->dni}}">
            @error('dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="number" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{$cliente->telefono}}">
            @error('telefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$cliente->email}}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Actualizar</button>
        <a href="{{route('cliente.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
    </form>
</div>
@endsection