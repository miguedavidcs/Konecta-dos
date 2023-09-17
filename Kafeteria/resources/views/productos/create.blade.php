@extends('home')

@section('title', 'Crear Producto')

@section('contenido')
<div class="container">
    <h1 class="my-4">Crear Nuevo Producto</h1>
    <form method="POST" action="{{ route('productos.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="cantidad_en_stock" class="form-label">Cantidad en Stock</label>
            <input type="number" class="form-control" id="cantidad_en_stock" name="cantidad_en_stock" required>
        </div>

        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor (opcional)</label>
            <input type="text" class="form-control" id="proveedor" name="proveedor">
        </div>

        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
@endsection
