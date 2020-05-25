@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Peliculas</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('movies/create') }}" class="btn btn-sm btn-info">Nueva Pelicula</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if (session('notification'))
        <div class="alert alert-info" role="alert">
            {{session('notification')}}
        </div>
        @endif
      
    </div>
    
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Año</th>
                    <th scope="col">Director</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <th scope="row">
                        {{$movie->nombre}}
                    </th>
                    <td>
                        {{$movie->categoria}}
                    </td>
                    <td>
                        {{$movie->año}}
                    </td>
                    <td>
                        {{$movie->director}}
                    </td>
                    <td>
                        
                        <form action="{{url('/movies/'.$movie->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('/movies/'.$movie->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                            <button  class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card-body">
    {{$movies->links()}}
</div> 
@endsection