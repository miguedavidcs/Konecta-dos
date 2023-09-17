@extends('home')

@section('contenido')
<div class="container">
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" name="nombre_producto" value="{{ $producto->nombre_producto }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="referencia">Referencia:</label>
            <input type="text" name="referencia" value="{{ $producto->referencia }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" name="precio" value="{{ $producto->precio }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="peso">Peso:</label>
            <input type="text" name="peso" value="{{ $producto->peso }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input type="text" name="categoria" value="{{ $producto->categoria }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="stock">Cantidad en Stock:</label>
            <input type="text" name="stock" value="{{ $producto->stock }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="fecha_de_creacion">Fecha de Creación:</label>
            <input type="date" name="fecha_de_creacion" value="{{ $producto->fecha_de_creacion }}" class="form-control">
        </div>



        <button type="submit" class="btn btn-primary" onclick="return confirm('¿Estás seguro de que deseas modificar este producto?')">Editar</button>
    </form>
</div>
@endsection
