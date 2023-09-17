@extends('home')

@section('contenido')
    <h1 class="text-3xl text-center mb-6">Lista de Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-4">Crear Producto</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre del Producto</th>
                <th>Referencia</th>
                <th>Precio</th>
                <th>Peso</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Fecha de Creación</th>
                <th>Acciones CRUD</th>
                <th>Compremos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre_producto }}</td>
                    <td>{{ $producto->referencia }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->peso }}</td>
                    <td>{{ $producto->categoria }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->fecha_de_creacion }}</td>
                    <td>
                        <!-- editar y eliminar -->
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('productos.comprar', $producto->id) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="number" name="cantidad_comprar" placeholder="Cantidad" class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-success">Comprar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

        </tbody>
    </table>

    <!-- Botón para mostrar el Producto con Mayor Stock -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#miModalProducto">Mostrar Producto con Mayor Stock</button>

    <!-- Modal de Producto con Mayor Stock -->
    <!-- Modal de Producto con Mayor Stock -->
<div class="modal" tabindex="-1" role="dialog" id="miModalProducto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Producto de Mayor Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El producto con mayor stock es:</p>
                <div class="alert alert-success">
                    @if ($productoMayorStock)
                        <p><strong>Nombre:</strong> {{ $productoMayorStock->nombre_producto }}</p>
                        <p><strong>Stock:</strong> {{ $productoMayorStock->stock }}</p>
                    @else
                        <p>No hay productos disponibles.</p>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


@endsection
