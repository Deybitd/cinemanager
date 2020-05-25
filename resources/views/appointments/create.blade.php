@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Registrar nueva Cita</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('home') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
  <form action="{{url('patients')}}" method="POST">
      @csrf
        <div class="form-group">
            <label for="specialty">Especialidad</label>
            <select name="specialty_id"  class="form-control" id="specialty" required>
                <option value="">Selecccionar Especialidad</option>
                @foreach ($specialties as $specialty)
            <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Medicos</label>
              <select name="doctor_id" id="doctor" class="form-control">
                
            </select>
        </div>
        <div class="form-group">
            <label for="dni">Fecha</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
            <input class="form-control datepicker"
                id="date" placeholder="Seleccionar Fecha"
                type="text" value="{{date('Y-m-d')}}"
                data-date-start-date="{{date('Y-m-d')}}"
                data-date-end-date="+30d" data-date-format="yyyy-mm-d">
            </div>
        </div>
        <div class="form-group">
            <label for="address">Hora de atencion</label>
            <div id="hours">

            </div>
        </div>
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
        </div>
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/appointments/create.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
@endsection