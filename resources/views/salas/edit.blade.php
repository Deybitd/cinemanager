@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Editar Sala</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('salas') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
  <form action="{{url('salas/'.$sala->id)}}" method="POST">
      @csrf
      @method('PUT')
        <div class="form-group">
            <label for="name">Nombre de la sala</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre',$sala->nombre)}}" required>
        </div>
        <div class="form-group">
            <label for="description">Numero de filas </label>
            <input type="text" name="num_filas" class="form-control" value="{{old('num_filas',$sala->num_filas)}}">
        </div>
        <div class="form-group">
            <label for="description">Numero de asientos por fila</label>
            <input type="text" name="asientosxfila" class="form-control" value="{{old('asientosxfila',$sala->asientosxfila)}}">
        </div>
        <div class="form-group">
            <label for="tipo">Tipo de sala</label>
            <select name="tipo" class="form-control" id="">
                <option value="Tradicional">Tradicional</option>
                <option value="3D">3D</option>
                <option value="IMAX">IMAX</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>
  </div>
</div>
@endsection