<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        return view('ventas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|integer',
            'fecha_venta' => 'required|date',
            'cantidad_vendida' => 'required|integer',
            'monto_total' => 'required|numeric',
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente');
    }

    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('ventas.show', compact('venta'));
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        return view('ventas.edit', compact('venta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_producto' => 'required|integer',
            'fecha_venta' => 'required|date',
            'cantidad_vendida' => 'required|integer',
            'monto_total' => 'required|numeric',
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($request->all());

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente');
    }
}
