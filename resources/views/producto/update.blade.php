@extends('layouts.body')

@section('content')

<div class="col-5 mx-auto">
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="mt-3 mb-3 text-center">Editar Producto</h2>
            <form action="{{ route('productos.update', $objProducto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="{{$objProducto->nombre}}" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input class="form-control" type="number" name="precio" id="precio" step="0.01" value="{{$objProducto->precio}}" required>
                </div>
                <div class="mb-3">
                    <label for="sku" class="form-label">SKU:</label>
                    <input class="form-control" type="text" name="SKU" id="SKU" value="{{$objProducto->SKU}}" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

@endsection