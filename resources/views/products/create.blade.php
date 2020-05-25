@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nuevo Producto</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('products') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
            </div>
        </div>
    </div>
  <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger" role="alert">
          <ul style = "list-style: none;">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
          </ul>
    </div>
      @endif
  <form action="{{url('products')}}" method="POST">
      @csrf
        <div class="form-group">
            <label for="name">Nombre de el producto</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
        </div>
        <div class="form-group">
            <label for="description">Precio</label>
            <input type="text" name="precio" class="form-control" value="{{old('precio')}}">
        </div>
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>
  </div>
</div>
@endsection