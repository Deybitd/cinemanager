@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Funciones</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('shows/create') }}" class="btn btn-sm btn-info">Nueva funcion</a>
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
                    <th scope="col">Sala</th>
                    <th scope="col">Pelicula</th>
                    <th scope="col">Inicio</th>
                    <th scope="col">Fin</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shows as $show)
                <tr>
                    <th scope="row">
                        {{$show->nombre}}
                    </th>
                    <td>
                        {{$salas[$show->sala_id]}}
                    </td>
                    <td>
                        {{$movies[$show->movie_id]}}
                    </td>
                    <td>
                        {{$show->show_start}}
                    </td>
                    <td>
                        {{$show->show_end}}
                    </td>
                    <td>
                        {{$show->date}}
                    </td>
                    <td>
                        
                        <form action="{{url('/shows/'.$show->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('/shows/'.$show->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
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
    {{$shows->links()}}
</div> 
@endsection