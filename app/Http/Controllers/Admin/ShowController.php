<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Show;
use Illuminate\Http\Request;
use App\Movie;
use App\Sala;
use App\Site;
use Carbon\Carbon;


class ShowController extends Controller
{
    
   

    public function index()
    {
        // $movies = Movie::all()->paginate(5);
        $shows = Show::shows()->paginate(5);
        $salas= [];
        foreach($shows as $show){
            $sala = Sala::find($show->sala_id);
            $salas[$show->sala_id]= $sala->nombre;
        }
        $movies = [];
        foreach($shows as $show){
            $movie = Movie::find($show->movie_id);
            $movies[$show->movie_id]= $movie->nombre;
        }
        return view('shows.index',compact('shows','salas','movies'));
    }

    public function create()
    {   
        $salas = Sala::all();
        $movies = Movie::all();
        return view('shows.create',compact('salas','movies'));
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
        $show = new show();
        // $show->nombre = $request->input('nombre');
        
        $show->sala_id= $request->input('sala_id');
        $show->movie_id = $request->input('movie_id');
        $show->show_start = $request->input('show_start');
        $show->show_end = $request->input('show_end');
        $show->date = $request->input('date');
        $sala = Sala::find($show->sala_id);
        $pelicula = Movie::find($show->movie_id);
        if($sala->tipo == 'Tradicional'){
            $precio = 45;
        }
        if($sala->tipo == '3D'){
            $precio = 65;
        }
        if($sala->tipo == 'IMAX'){
            $precio = 70;
        }
        $start = (string)$show->show_start;
        $show->nombre = $pelicula->nombre." ".$show->show_start;
        $show->precio = $precio;
        $show->date = Carbon::now();
        $show->date->toDateString();
        $show->save();

        
        for($i=1;$i<=$sala->num_filas;$i++){
            
            for($j=1;$j<=$sala->asientosxfila;$j++){
                $site = new Site();
                $site->show_id = $show->id;
                $filas = (string)$i;
                $asiento = (string)$j;
                $site->nombre = "Fila:".$filas." Asiento:".$asiento;
                $site->ocupado= false;
                $site->save();
            }
          
        }
      
        
        // $site->crear($site,$sala->num_filas,$sala->asientosxfila);

        $notification = 'La Funcion se ha registrado Correctamente';
        return redirect('/shows')->with(compact('notification'));

    }

    public function edit(Show $show)
    {   
        $salas = Sala::all();
        $movies = Movie::all();
        return view('shows.edit', compact('show','salas','movies'));
    }


    public function update(Request $request, Show $show)
    {
        //dd($request->all());// mostrar valores en pantalla
        $this->performValidation($request);
        $show->nombre = $request->input('nombre');
        $show->sala_id= $request->input('sala_id');
        $show->movie_id = $request->input('movie_id');
        $show->show_start = $request->input('show_start');
        $show->show_end = $request->input('show_end');
        $show->date = $request->input('date');
        $show->date = Carbon::now();
        $show->date->toDateString();
        $show->save();
        $notification = 'La funcion se ha modificado Correctamente';
        return redirect('/shows')->with(compact('notification'));
    }
    public function destroy(Show $show)
    {   $deletedShow = $show->nombre;
        $show->delete();
        $notification = 'La funcion '. $deletedShow.' se ha eliminado correctamente';
        return redirect('/shows')->with(compact('notification'));
    }

}
