@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Modificar Empleado de  Dulceria</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('edulcerias') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
  <form action="{{url('edulcerias/'.$edulceria->id)}}" method="POST">
      @csrf
      @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del Empleado</label>
            <input type="text" name="name" class="form-control" value="{{old('name',$edulceria->name)}}" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control" value="{{old('email',$edulceria->email)}}">
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" name="dni" class="form-control" value="{{old('dni',$edulceria->dni)}}">
        </div>
        <div class="form-group">
            <label for="address">Direccion</label>
            <input type="text" name="address" class="form-control" value="{{old('address',$edulceria->address)}}">
        </div>
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" class="form-control" value="{{old('phone',$edulceria->phone)}}">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="text" name="password" class="form-control" value="">
            <p><em>Ingrese un valor solo si desea modificar la contraseña.</em></p>
        </div>
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>
  </div>
</div>
@endsection