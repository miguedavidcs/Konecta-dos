@extends('home')

@section('contenido')
    <h1 class="text-3xl text-center mb-6">Lista de Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-4">Crear Producto</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre del Producto</th>
                <th>Precio</th>
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
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->cantidad_en_stock }}</td>
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
        </tbody>
    </table>
@endsection
