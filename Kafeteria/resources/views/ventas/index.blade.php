@extends('home')

@section('contenido')
    <div class="container">
        <h1 class="text-3xl text-center mb-6">Lista de Ventas</h1>

        <!-- Tabla de Ventas -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID de Venta</th>
                    <th>ID de Producto</th>
                    <th>Fecha de Venta</th>
                    <th>Cantidad Vendida</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->id_producto }}</td>
                        <td>{{ $venta->fecha_venta }}</td>
                        <td>{{ $venta->cantidad_vendida }}</td>
                        <td>{{ $venta->monto_total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-primary" data-toggle="modal" data-target="#miModalVentas">Mostrar Producto Más Vendido</button>

        <!-- Modal de Ventas -->
        <div class="modal" tabindex="-1" role="dialog" id="miModalVentas">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Producto Más Vendido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>El producto más vendido es:</p>
                        <div class="alert alert-success">
                            <p><strong>Nombre:</strong> {{ $productoMasVendido->producto->nombre_producto }}</p>
                            <p><strong>Cantidad Vendida:</strong> {{ $productoMasVendido->total_ventas }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
