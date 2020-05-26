@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nueva venta</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('sales') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
  <form action="{{url('sales')}}" method="POST">
      @csrf
        {{-- <div class="form-group">
            <label for="name">Nombre de la funcion</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" required>
        </div> --}}
        <div class="form-group">
            <label for="">Funcion</label>
            <select name="funcion" class="form-control " data-style="btn-outline-info" title="Seleccione una funcion">
                @foreach ($shows as $show)
                    <option value="{{$show->id}}">{{$show->nombre}}</option>
                @endforeach

            </select>

        </div>
        <div class="form-group">
            <label for="">Asiento</label>
            <select name="asiento" class="form-control " data-style="btn-outline-info" title="Seleccione una sala">
                @foreach ($asientos as $asiento)
                    <option value="{{$asiento->id}}">{{$asiento->nombre}}</option>
                @endforeach

            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>
  </div>
</div>
@endsection