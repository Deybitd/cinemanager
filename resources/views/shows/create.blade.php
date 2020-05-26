@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nueva funcion</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('shows') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
  <form action="{{url('shows')}}" method="POST">
      @csrf
        {{-- <div class="form-group">
            <label for="name">Nombre de la funcion</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" required>
        </div> --}}
        <div class="form-group">
            <label for="">Pelicula</label>
            <select name="movie_id" class="form-control " data-style="btn-outline-info" title="Seleccione una pelicula">
                @foreach ($movies as $movie)
                    <option value="{{$movie->id}}">{{$movie->nombre}}</option>
                @endforeach

            </select>

        </div>
        <div class="form-group">
            <label for="">Sala</label>
            <select name="sala_id" class="form-control " data-style="btn-outline-info" title="Seleccione una sala">
                @foreach ($salas as $sala)
                    <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="date" class="form-control-label">Fecha</label>
            <input class="form-control" name="date "type="date" value="{{date('Y-m-d')}}" id="date">
        </div>

        <div class="form-group">
            <label for="show_start" class="form-control-label">Hora Inicio</label>
            <input class="form-control" name="show_start" type="time" value="12:00:00" id="show_start">
        </div>

        <div class="form-group">
            <label for="show_end" class="form-control-label">Hora termino</label>
            <input class="form-control" name="show_end" type="time" value="02:00:00" id="show_start">
        </div>
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>
  </div>
</div>
@endsection