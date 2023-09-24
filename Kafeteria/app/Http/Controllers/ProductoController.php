<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use Carbon\Carbon;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $productoMayorStock = Producto::orderBy('stock', 'desc')->first();

        return view('productos.index', compact('productos', 'productoMayorStock'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'referencia' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'peso' => 'required|numeric',
            'categoria' => 'required|string|max:255',
            'stock' => 'required|integer',

            'proveedor' => 'nullable|string|max:255',
        ]);


        $producto = new Producto([
            'nombre_producto' => $request->input('nombre_producto'),
            'referencia' => $request->input('referencia'),
            'precio' => $request->input('precio'),
            'peso' => $request->input('peso'),
            'categoria' => $request->input('categoria'),
            'stock' => $request->input('stock'),

            'proveedor' => $request->input('proveedor'),
        ]);
        $producto->fecha_de_creacion = now();

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
        $producto = Producto::find($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'nombre_producto' => 'required|string|max:255',
        'referencia' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'peso' => 'required|numeric',
        'categoria' => 'required|string|max:255',
        'stock' => 'required|integer',
        'fecha_de_creacion' => 'required|date',
    ]);


    $producto = Producto::findOrFail($id);


    $producto->nombre_producto = $request->input('nombre_producto');
    $producto->referencia = $request->input('referencia');
    $producto->precio = $request->input('precio');
    $producto->peso = $request->input('peso');
    $producto->categoria = $request->input('categoria');
    $producto->stock = $request->input('stock');

    $producto->fecha_de_creacion = $request->input('fecha_de_creacion');


    $producto->save();

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

        if ($cantidadComprar > $producto->stock) {
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

        $producto->stock -= $cantidadComprar;
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Compra realizada con éxito: ' . $producto->nombre_producto);
    }
}
