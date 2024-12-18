<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Core\Application\ProductoService;
use App\Infraestructura\ProductoRepositoryFb;

class ProductoController extends Controller
{
    private ProductoService $productoService;

    public function __construct()
    {
        // la instancia del servicio se crea manualmente, pero
        // se puede obtener mediante el inyector de dependencias
        // se le pasa por parámetro una clase que implementa la interfaz ProductoRepository
        // Aquí es donde se hace la inyección de dependencias

        
        $this->productoService = new ProductoService(
            new \App\Infraestructura\ProductoRepositoryFb()
        );

        // $this->productoService = new ProductoService(
        //     new \App\Infraestructura\ProductoRepositoryFb()
        // );
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // obtiene el valor del filtro enviado por la vista, si no hay filtro = ''
        $filtro = $request->input('filtro') ?: '';

        //obtiene los profuctos
        $productos = $this->productoService->searchProducto($filtro);

        //pasa los productos a la vista
        return view('producto.lista-productos', [
            'productos' => $productos,
            'filtro' => $filtro,  // pasa el valor del filtro a la vista para que lo muestre
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.nuevo-producto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('producto-create');
        
        // validación de los datos enviados por el formulario
        $validatedData = $request->validate([
            'codigo' => ['required', 'max:20'],
            'nombre' => ['required'],
            'precio' => ['required', 'numeric'],
        ]);

        $this->productoService->nuevoProducto($validatedData);

        return redirect('producto/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo "mostrando: id=" . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        Gate::authorize('producto-update');
        
        // recupera el producto
        $producto = $this->productoService->getProducto($id);

        // si el producto no existe, vuelve atrás mostrando un error
        if (!$producto) {
            return redirect()->back()->withErrors('El producto no existe');
        }

        return view('producto.modificar-producto', [
            'producto' => $producto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('producto-update');
        
        $validatedData = $request->validate([
            'codigo' => ['required', 'max:20'],
            'nombre' => ['required'],
            'precio' => ['required', 'numeric'],
        ]);

        $this->productoService->modificarProducto($id, $validatedData);

        return redirect('producto/index')->with('success', 'Producto actualizado');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('producto-delete');
        
        $this->productoService->eliminarProducto($id);

        return redirect('producto/index')->with('success', 'Producto eliminado');
    }

    public function getSemana(){
        $semana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
        return response()->json($semana);
    }
}
