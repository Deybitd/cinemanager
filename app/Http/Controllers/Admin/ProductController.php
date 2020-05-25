<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    
   

    public function index()
    {
       
        $products = Product::products()->paginate(5);
        return view('products.index',compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    private function performValidation(Request $request)
    {
        $rules =[
            'nombre' => 'required'
        ];
        $messages =[
            'nombre.required' => 'Es necesario ingresar un nombre',
        ];
        $this->validate($request, $rules,$messages);
    }
    public function store(Request $request)
    {
        //dd($request->all());// mostrar valores en pantalla
        $this->performValidation($request);
        $product = new Product();
        $product->nombre = $request->input('nombre');
        $product->precio = $request->input('precio');
        $product->descripcion = $request->input('descripcion');
        $product->save();
        $notification = 'La pelicula  se ha registrado Correctamente';
        return redirect('/products')->with(compact('notification'));

    }

    public function edit(product $product)
    {
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        //dd($request->all());// mostrar valores en pantalla
        $this->performValidation($request);
        $product->nombre = $request->input('nombre');
        $product->precio = $request->input('precio');
        $product->descripcion = $request->input('descripcion');
        $product->save();
        $notification = 'La pelicula  se ha Modificado Correctamente';
        return redirect('/products')->with(compact('notification'));
    }
    public function destroy(Product $product)
    {   $deletedproduct = $product->nombre;
        $product->delete();
        $notification = 'El Producto '. $deletedproduct.' se ha eliminado correctamente';
        return redirect('/products')->with(compact('notification'));
    }

}
