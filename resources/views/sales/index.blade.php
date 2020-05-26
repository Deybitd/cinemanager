@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Ventas</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('sales/create') }}" class="btn btn-sm btn-info">Nueva venta</a>
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
                    <th scope="col">Nombre del empleado</th>
                    <th scope="col">id venta</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Total</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <th scope="row">
                        {{$sale->nombre_vendedor}}
                    </th>
                    <td>
                        {{$sale->id}}
                    </td>
                    <td>
                        {{$sale->descripcion}}
                    </td>
                    <td>
                        {{$sale->total}}
                    </td>
                   
                   
                    <td>
                        
                        {{-- <form action="{{url('/sales/'.$sale->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('/sales/'.$sale->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                            <button  class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                        </form> --}}
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card-body">
    {{$sales->links()}}
</div> 
@endsection