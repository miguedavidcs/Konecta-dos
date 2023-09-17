@extends('home')

@section('contenido')
    <h1>Lista de Ventas</h1>

    <table>
        <thead>
            <tr>
                <th>ID de Venta</th>
                <th>ID de Producto</th>
                <th>Fecha de Venta</th>
                <th>Cantidad Vendida</th>
                <th>Monto Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->id_venta }}</td>
                    <td>{{ $venta->id_producto }}</td>
                    <td>{{ $venta->fecha_venta }}</td>
                    <td>{{ $venta->cantidad_vendida }}</td>
                    <td>{{ $venta->monto_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
