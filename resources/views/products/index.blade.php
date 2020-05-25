@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Productos</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('products/create') }}" class="btn btn-sm btn-info">Nuevo Producto</a>
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
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">
                        {{$product->nombre}}
                    </th>
                    <td>
                        {{$product->descripcion}}
                    </td>
                    <td>
                        {{$product->precio}}
                    </td>
              
                    <td>
                        
                        <form action="{{url('/products/'.$product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('/products/'.$product->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
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
    {{$products->links()}}
</div> 
@endsection