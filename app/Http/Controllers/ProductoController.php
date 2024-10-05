<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

use function Laravel\Prompts\error;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validar = [
                'nombre' => 'required',
                'precio' => ' required|numeric',
                'SKU' => 'required'
            ];

            $request->validate($validar);

            Producto::create([
                'nombre' => $request->post('nombre'),
                'precio' => $request->post('precio'),
                'SKU' => $request->post('SKU')
            ]);

            return redirect()->route('productos.index')->with('success', '¡Producto registrado exitosamente!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Error al registrar el producto: ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {

            $objProducto = Producto::find($id);

            if (!$objProducto) {
                return redirect()->route('productos.index')->with('error', 'Producto no encontrado.');
            }

            return view('producto.update', compact('objProducto'));
        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Ocurrio un error: ' . $ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $validar = [
                'nombre' => 'required',
                'precio' => ' required|numeric',
                'SKU' => 'required'
            ];

            $request->validate($validar);

            $obj = Producto::find($id);

            $obj->nombre = $request->post('nombre');
            $obj->precio = $request->post('precio');
            $obj->SKU = $request->post('SKU');

            $obj->save();

            return redirect()->route('productos.index')->with('success', '¡Producto actualizado con exito!');
        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Ocurrio un error al actualizar el producto: ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $producto = Producto::findOrFail($id);

            $producto->delete();

            return redirect()->route('productos.index')->with('success', '¡Producto eliminado con exito!');
            
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Error al eliminar el producto: ' . $ex->getMessage());
        }
    }
}
