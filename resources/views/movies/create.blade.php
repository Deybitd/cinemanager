@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nueva Pelicula</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('movies') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
  <form action="{{url('movies')}}" method="POST">
      @csrf
        <div class="form-group">
            <label for="name">Nombre de la Pelicula</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
        </div>
        <div class="form-group">
            <label for="description">Director</label>
            <input type="text" name="director" class="form-control" value="{{old('director')}}">
        </div>
        <div class="form-group">
            <label for="description">Año</label>
            <input type="text" name="año" class="form-control" value="{{old('año')}}">
        </div>
        <div class="form-group">
            <label for="description">Categoria</label>
            <input type="text" name="categoria" class="form-control" value="{{old('categoria')}}">
        </div>
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>
  </div>
</div>
@endsection