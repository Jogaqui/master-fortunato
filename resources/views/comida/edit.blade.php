@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Editar Comida</h5>
</div>
<div class="card-body table-border-style">
    <form method="POST" action="{{route('comida.update',$comida->idComida)}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{$comida->idComida}}" disabled>
        </div>
        <div class="mb-3">
            <label for="nombreComida" class="form-label">Nombre:</label>
            <input type="text" class="form-control @error('nombreComida') is-invalid @enderror" id="nombreComida" name="nombreComida" value="{{$comida->nombreComida}}">
            @error('nombreComida')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" step="0.01" value="{{$comida->precio}}">
            @error('precio')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="idcategoria" class="form-label">Categoría:</label>
            <select class="form-control" name="idcategoria" id="idcategoria">
                @foreach($categoria as $item)
                <option value="{{$item['idcategoria']}}" {{$item->idcategoria == $comida->idcategoria ? 'selected' : ''}}>{{$item['descripcion']}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Actualizar</button>
        <a href="{{route('comida.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
    </form>
</div>
@endsection