@extends('layouts.panel')
@section('title','Administracion Empleados Dulceria ')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0"> Empleados De Dulceria</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('edulcerias/create') }}" class="btn btn-sm btn-info">Nuevo Empleado</a>
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
                    <th scope="col">Email</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($edulcerias as $edulceria)
                <tr>
                    <th scope="row">
                        {{$edulceria->name}}
                    </th>
                    <td>
                        {{$edulceria->email}}
                    </td>
                    <td>
                        {{$edulceria->dni}}
                    </td>
                    <td>
                        
                        <form action="{{url('/edulcerias/'.$edulceria->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('/edulcerias/'.$edulceria->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                            <button  class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body">
        {{$edulcerias->links()}}
    </div> 
</div>
@endsection