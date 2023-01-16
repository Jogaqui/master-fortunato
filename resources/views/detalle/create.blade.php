@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Crear Pedidos</h5>
</div>
<div class="card-body table-border-style">
    <form method="POST" action="{{route('detalle.store')}}">
        @csrf
      
        <div class="mb-3">
            <label for="id" class="form-label">Pedido:</label>
            @foreach($comanda as $item)
            @endforeach
           
            <input type="text" class="form-control" id="idcomanda" name="idcomanda"  value="{{$item->idcomanda}}">
        </div>
        <div class="mb-3">
            <label for="id" class="form-label">Categorias: </label>
            <select class="form-control" name="id" id="select-project">
                @foreach($categoria as $item)
                <option value="{{$item['idcategoria']}}">{{$item['descripcion']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="idcomida" class="form-label">Comidas:</label>
            <select class="form-control" name="idcomida" id="idcomida" >
                @foreach($comida as $item)
                <option value="{{$item['idcomida']}}">{{$item['nombreComida']}}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="nombreComida" class="form-label">Observacion:</label>
            <input type="text" class="form-control @error('observacion') is-invalid @enderror" id="observacion" name="observacion">
            @error('observacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Cantidad:</label>
            <input type="number" class="form-control @error('precio') is-invalid @enderror" id="cantidad" name="cantidad" step="1" value="1" >
            @error('cantidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

   
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
        <a href="{{route('detalle.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"> Cancelar</i></a>
    </form>
</div>
@endsection



