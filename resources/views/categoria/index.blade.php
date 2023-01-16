@extends('layouts.plantilla')

@section('contenido')
<div class="card-header">
    <h5>Mantenedor de Categoría</h5>

</div>
<div class="card-body table-border-style">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($categoria)<=0) <tr>
                    <td colspan="3">No hay registros</td>
                    </tr>
                    @else
                    @foreach($categoria as $item)
                    <tr>
                        <td>{{$item->idcategoria}}</td>
                        <td>{{$item->descripcion}}</td>
                        <td>
                            <a href="{{route('categoria.edit',$item->idcategoria)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                            <a href="{{route('categoria.confirmar',$item->idcategoria)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
            </tbody>
        </table>
    </div>
    <form class="d-flex" role="search">
        <div class="input-group mb-3">
            <input value="{{$buscarpor}}" name="buscarpor" type="search" class="form-control" placeholder="Ingrese el término a buscar" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </div>

    </form>
    <div>
        <a href="{{route('categoria.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo registro</a>
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
        {{$categoria->links()}}
    </div>
</div>
@endsection