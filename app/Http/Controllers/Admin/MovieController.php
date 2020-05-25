<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;


class MovieController extends Controller
{
    
   

    public function index()
    {
        // $movies = Movie::all()->paginate(5);
        $movies = Movie::movies()->paginate(5);
        return view('movies.index',compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
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
        $movie = new Movie();
        $movie->nombre = $request->input('nombre');
        $movie->director = $request->input('director');
        $movie->categoria = $request->input('categoria');
        $movie->año = $request->input('año');
        $movie->descripcion = $request->input('descripcion');
        $movie->save();
        $notification = 'La pelicula  se ha registrado Correctamente';
        return redirect('/movies')->with(compact('notification'));

    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }


    public function update(Request $request, Movie $movie)
    {
        //dd($request->all());// mostrar valores en pantalla
        $this->performValidation($request);
        $movie->nombre = $request->input('nombre');
        $movie->director = $request->input('director');
        $movie->categoria = $request->input('categoria');
        $movie->año = $request->input('año');
        $movie->descripcion = $request->input('descripcion');
        $movie->save();
        $notification = 'La pelicula  se ha modificado Correctamente';
        return redirect('/movies')->with(compact('notification'));
    }
    public function destroy(Movie $movie)
    {   $deletedMovie = $movie->nombre;
        $movie->delete();
        $notification = 'La pelicula '. $deletedMovie.' se ha eliminado correctamente';
        return redirect('/movies')->with(compact('notification'));
    }

}
