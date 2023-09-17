@extends('home')

@section('contenido')
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" name="nombre_producto" value="{{ $producto->nombre_producto }}" placeholder="{{ $producto->nombre_producto }}" class="edit-field">
        </div>

        <div>
            <label for="precio">Precio:</label>
            <input type="text" name="precio" value="{{ $producto->precio }}" placeholder="{{ $producto->precio }}" class="edit-field">
        </div>

        <div>
            <label for="cantidad_en_stock">Cantidad en Stock:</label>
            <input type="text" name="cantidad_en_stock" value="{{ $producto->cantidad_en_stock }}" placeholder="{{ $producto->cantidad_en_stock }}" class="edit-field">
        </div>

        <div>
            <label for="fecha_de_creacion">Fecha de Creación:</label>
            <input type="date" name="fecha_de_creacion" value="{{ $producto->fecha_de_creacion }}" placeholder="{{ $producto->fecha_de_creacion }}" class="edit-field">
        </div>

        <button type="submit" class="edit-button" onclick="return confirm('¿Estás seguro de que deseas modificar este producto?')">Editar</button>
    </form>
@endsection