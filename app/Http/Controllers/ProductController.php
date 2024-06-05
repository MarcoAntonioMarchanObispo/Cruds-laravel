<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Muestra una lista paginada de productos.
     */
    public function index(Request $request)
    {
        // Obtener la consulta de búsqueda del formulario
        $query = $request->input('query');

        // Filtrar productos según la consulta de búsqueda si existe
        $products = Product::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query%");
        })->paginate(6);

        // Retornar la vista con los productos filtrados y la consulta de búsqueda
        return view('products.index', [
            'products' => $products,
            'query' => $query,
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Almacena un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        // Crear un nuevo producto con los datos validados
        Product::create($validatedData);

        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto creado con éxito');
    }

    /**
     * Muestra los detalles de un producto específico.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, Product $product)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        // Actualizar el producto con los datos validados
        $product->update($validatedData);

        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto actualizado con éxito');
    }

    /**
     * Elimina un producto de la base de datos.
     */
    public function destroy(Product $product)
    {
        // Eliminar el producto
        $product->delete();

        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto eliminado con éxito');
    }
}
