@extends('layouts.body')

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="col-12 mb-3">   
                <a href="{{ route('productos.create') }}" class="btn btn-primary ms-3 mt-3"><i class="fa-solid fa-folder-plus"></i> Nuevo</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="productos">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>PRECIO</th>
                            <th>SKU</th>
                            <th>REGISTRO</th>
                            <th>ULTIMA ACTUALIZACION</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>$ {{ $producto->precio }}</td>
                            <td>{{ $producto->SKU }}</td>
                            <td>{{ $producto->created_at }}</td>
                            <td>{{ $producto->updated_at }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-warning" href="{{route('productos.edit', $producto->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

