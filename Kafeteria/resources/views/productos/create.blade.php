@extends('home')

@section('title', 'Crear Producto')

@section('contenido')
<div class="container">
    <h1 class="my-4">Crear Producto</h1>
    <form method="POST" action="{{ route('productos.store') }}">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
                </div>

                <div class="mb-3">
                    <label for="referencia" class="form-label">Referencia</label>
                    <input type="text" class="form-control" id="referencia" name="referencia" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="peso" class="form-label">Peso</label>
                    <input type="number" class="form-control" id="peso" name="peso" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" required>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Cantidad en Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_de_creacion" class="form-label">Fecha de Creación</label>
                    <input type="date" class="form-control" id="fecha_de_creacion" name="fecha_de_creacion" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
@endsection
