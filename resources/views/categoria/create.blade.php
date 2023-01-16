@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Crear Categoría</h5>
</div>
<div class="card-body table-border-style">
    <form method="POST" action="{{route('categoria.store')}}">
        @csrf
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">
            @error('descripcion')
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