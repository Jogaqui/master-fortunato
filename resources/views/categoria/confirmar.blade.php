@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Eliminar Categoría</h5>
</div>
<div class="card-body table-border-style">
    <form method="POST" action="{{route('categoria.destroy',$categoria->idcategoria)}}">
        @method('delete')
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{$categoria->idcategoria}}" disabled>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{$categoria->descripcion}}" disabled>
        </div>
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i>Eliminar</button>
        <a href="{{route('categoria.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle">Cancelar</i></a>
    </form>
</div>
@endsection