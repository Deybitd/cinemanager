<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Sala;
use Illuminate\Http\Request;


class SalaController extends Controller
{
    
   

    public function index()
    {
        // $movies = Movie::all()->paginate(5);
        $salas = Sala::salas()->paginate(5);
        return view('salas.index',compact('salas'));
    }

    public function create()
    {
        return view('salas.create');
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
        $sala = new Sala();
        $sala->nombre = $request->input('nombre');
        $sala->tipo = $request->input('tipo');
        $sala->num_filas = $request->input('num_filas');
        $sala->asientosxfila = $request->input('asientosxfila');
        $sala->save();
        $notification = 'La Sala se ha registrado Correctamente';
        return redirect('/salas')->with(compact('notification'));

    }

    public function edit(Sala $sala)
    {
        return view('salas.edit', compact('sala'));
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
        return redirect('/salas')->with(compact('notification'));
    }

}
