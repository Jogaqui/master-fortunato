@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Crear Mesa</h5>
</div>
<div class="card-body table-border-style">
    <form method="POST" action="{{route('mesa.store')}}">
        @csrf
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación:</label>
            <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" name="ubicacion">
            @error('ubicacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad:</label>
            <input type="number" class="form-control @error('capacidad') is-invalid @enderror" id="capacidad" name="capacidad">
            @error('capacidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
        <a href="{{route('categoria.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"> Cancelar</i></a>
    </form>
</div>
@endsection