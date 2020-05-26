<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Sale;
use App\User;
use Illuminate\Http\Request;


class SaleController extends Controller
{
    
   

    public function index()
    {
        // $movies = Movie::all()->paginate(5);
        $sales = Sale::sales()->paginate(5);
        return view('sales.index',compact('sales'));
    }

    public function create()
    {
        return view('sales.create');
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
        
        $sale = new Sale();
        $sale->nombre_vendedor = auth()->user()->name;
        $sale->tipo = $request->input('tipo');
        $sale->total = $request->input('num_filas');
        $sala->asientosxfila = $request->input('asientosxfila');
        $sala->save();
        $notification = 'La Sala se ha registrado Correctamente';
        return redirect('/sales')->with(compact('notification'));

    }

    public function edit(Sala $sala)
    {
        return view('sales.edit', compact('sale'));
    }


    public function update(Request $request, Sala $sala)
    {
        //dd($request->all());// mostrar valores en pantalla
        $this->performValidation($request);
        $sala->nombre = $request->input('nombre');
        $sala->tipo = $request->input('tipo');
        $sala->num_filas = $request->input('num_filas');
        $sala->asientosxfila = $request->input('asientosxfila');
        $sala->save();
        $notification = 'La Sala  se ha modificado Correctamente';
        return redirect('/salas')->with(compact('notification'));
    }
    public function destroy(Sala $sala)
    {   $deletedSala = $sala->nombre;
        $sala->delete();
        $notification = 'La sala '. $deletedSala.' se ha eliminado correctamente';
        return redirect('/sales')->with(compact('notification'));
    }

}
