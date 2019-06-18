@extends('layout.admin')

@section('content')

@include('alerts.request')

<br>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">

        {!! Form::open(['route'=>'usuario.store', 'method'=>'POST']) !!}

        <legend>Crear Usuario</legend>
        {!! csrf_field() !!}

        <div class="form-group">
          {!! Form::label('Nombre') !!}
          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Clave de Funcionario') !!}
          {!! Form::text('clave_fun',null,['class'=>'form-control', 'placeholder'=>'Clave de Funcionario']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Correo') !!}
          {!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Correo']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Contraseña') !!}
          {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'Contraseña']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Confirmar Contraseña') !!}
          {!! Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Confirmar Contraseña']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Teléfono') !!}
          {!! Form::number('telefono',null,['class'=>'form-control', 'placeholder'=>'Teléfono']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Dirección') !!}
          {!! Form::text('direccion',null,['class'=>'form-control', 'placeholder'=>'Dirección']) !!}
        </div>

        <br>
        <div>
          {!! Form::label('Region','Region') !!}
          {!! Form::select('region', $regiones,null,['placeholder'=>'--Seleccione Region--','id'=>'region']) !!}
        </div>

        <br>
        <div class="form-group">
          {!! Form::label('Municipio') !!}
          {!! Form::select('municipio', ['placeholder'=>'--Seleccione Municipio--'],null,['id'=>'municipio']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Puesto') !!}
          {!! Form::select('puesto',['Contralor'=>'Contralor','Obra Pública'=>'Obra Pública','Función Pública'=>'Función Pública', 'Departamento de Economía'=>'Departamento de Economía']) !!}
        </div>

        {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
