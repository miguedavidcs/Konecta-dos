<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Agrega la importación para DB

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad_en_stock' => 'required|integer',
            'proveedor' => 'nullable|string|max:255',
        ]);

        $producto = new Producto([
            'nombre_producto' => $request->input('nombre_producto'),
            'precio' => $request->input('precio'),
            'cantidad_en_stock' => $request->input('cantidad_en_stock'),
            'proveedor' => $request->input('proveedor'),
            'fecha_de_creacion' => Carbon::now(), // Establecer la fecha actual automáticamente
        ]);

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad_en_stock' => 'required|integer',
            'proveedor' => 'nullable|string|max:255',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy($id)
    {

        $producto = Producto::findOrFail($id);

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }

    public function comprar(Request $request, $id)
    {

        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado.');
        }

        $cantidadComprar = $request->input('cantidad_comprar');

        if ($cantidadComprar > $producto->cantidad_en_stock) {
            return redirect()->route('productos.index')->with('error', 'La cantidad supera el stock disponible.');
        }

        $fechaActual = Carbon::now();
        $totalCompra = $cantidadComprar * $producto->precio;

        $venta = new Venta();
        $venta->id_producto = $producto->id;
        $venta->fecha_venta = $fechaActual;
        $venta->cantidad_vendida = $cantidadComprar;
        $venta->monto_total = $totalCompra;
        $venta->save();

        $producto->cantidad_en_stock -= $cantidadComprar;
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Compra realizada con éxito.');
    }

    public function crearProducto(Request $request)
    {

        $nombre = $request->input('nombre_producto'); // Ajusta el nombre del campo
        $precio = $request->input('precio');
        $stock = $request->input('cantidad_en_stock'); // Ajusta el nombre del campo
        $proveedor = $request->input('proveedor');

        $query = "INSERT INTO productos (nombre_producto, precio, cantidad_en_stock, proveedor, fecha_de_creacion, created_at, updated_at)
                  VALUES (?, ?, ?, ?, NOW(), NOW(), NOW())";

        DB::insert($query, [$nombre, $precio, $stock, $proveedor]);

        return redirect()->route('productos.index');
    }
}
