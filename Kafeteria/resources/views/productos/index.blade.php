@extends('home')

@section('contenido')
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
    <br>
    <table>
        <thead>
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
                        <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('productos.comprar', $producto->id) }}" method="POST">
                            @csrf
                            <input type="number" name="cantidad_comprar" placeholder="Cantidad">
                            <button type="submit">Comprar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
