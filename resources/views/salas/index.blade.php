@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Salas</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('salas/create') }}" class="btn btn-sm btn-info">Nueva Sala</a>
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
                    <th scope="col">Numero de filas</th>
                    <th scope="col">Numeros de asientos por fila </th>
                    <th scope="col">Tipo de sala</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salas as $sala)
                <tr>
                    <th scope="row">
                        {{$sala->nombre}}
                    </th>
                    <td>
                        {{$sala->num_filas}}
                    </td>
                    <td>
                        {{$sala->asientosxfila}}
                    </td>
                    <td>
                        {{$sala->tipo}}
                    </td>
                    <td>
                        
                        <form action="{{url('/salas/'.$sala->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('/salas/'.$sala->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
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
    {{$salas->links()}}
</div> 
@endsection