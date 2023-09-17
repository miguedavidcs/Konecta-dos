<!-- resources/views/home.blade.php -->
<html>

<head>
    <title>Menú Principal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div id="menu">
        <a href="{{ route('productos.index') }}">Productos</a>
        <a href="{{ route('ventas.index') }}">Ventas</a>
    </div>
    <div id="contenido">
        @yield('contenido')
    </div>
    @section('scripts')
        <script src="{{ asset('js/tu-archivo.js') }}"></script>
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Scripts de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
