@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Eliminar Comida</h5>
</div>
<div class="card-body table-border-style">
    <form method="POST" action="{{route('mesa.destroy',$mesa->idcomida)}}">
        @method('delete')
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{$mesa->idcomida}}" disabled>
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación:</label>
            <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" name="ubicacion" value="{{$mesa->ubicacion}}" disabled>
            @error('ubicacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad:</label>
            <input type="number" class="form-control @error('capacidad') is-invalid @enderror" id="capacidad" name="capacidad" value="{{$mesa->capacidad}}" disabled>
            @error('capacidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i>Eliminar</button>
        <a href="{{route('mesa.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle">Cancelar</i></a>
    </form>
</div>
@endsection