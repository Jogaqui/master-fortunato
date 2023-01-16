@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Mantenedor de Pedidos</h5>
</div>
<div class="card-body table-border-style">
   
    <form class="d-flex" role="search">
    <div class="mb-3">
        <label for="idcomanda" class="form-label">Comanda</label>
        <select class="form-control" name="idcomanda" id="select-mesa">
            <option value="{{$buscarpor}}">Seleccione comada</option>
            @foreach($comanda as $item)
            <option value="{{$item['idcomanda']}}">{{$item['idcomanda']}}</option>
            @endforeach
        </select>
    </div>
    <div class="input-group-append">
        <button class="btn btn-primary" type="submit">Buscar</button>
    </div>
     </form>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mesa</th>
                    <th scope="col">Pedido</th>
                    <th scope="col">Observacion</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @if (count($detalle)<=0) <tr>
                    <td colspan="5">No hay registros</td>
                    </tr>
                    @else
                    @foreach($detalle as $item)
                    <tr>
                        <td>{{$item->comanda->mesa->ubicacion}}</td>
                        <td>{{$item->comida->nombreComida}}</td>
                        <td>{{$item->observacion}}</td>
                        <td>{{$item->cantidad}}</td>

                        <td>
                            <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ingresar</a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{route('detalle.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo registro</a>
    </div>
    @if(session('datos'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div>
        {{$detalle->links()}}
    </div>
</div>


@endsection

