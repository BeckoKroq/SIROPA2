@extends('layout.admin')

@section('content')

@include('alerts.request')

<br>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">

        {!! Form::model($adquisicion,['route'=>['adquisicion.update', $adquisicion->id], 'method'=>'PUT']) !!}

        <legend>Editar Adquisición</legend>

        <div class="form-group">
          {!! Form::label('Nombre','Nombre de la Adquisición') !!}
          {!! Form::text('nombre_adquisicion',null,['class'=>'form-control', 'placeholder'=>'Nombre de la Adquisición']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Numero','Número del Contrato') !!}
          {!! Form::text('numero_adquisicion',null,['class'=>'form-control', 'placeholder'=>'Número de la Adquisición']) !!}
        </div>

        <div class="form-group">

          {!! Form::hidden('region',null) !!}
        </div>

        <div class="form-group">

          {!! Form::hidden('municipio_id',null) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Localidad','Localidad') !!}
          {!! Form::text('localidad',null,['class'=>'form-control', 'placeholder'=>'Área']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('Fecha_inicio','Fecha de Inicio') !!}
        {!! Form::date('fecha_inicio',null,['class'=>'form-control', 'min'=>'2017-01-01']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('Fecha_final','Fecha de Límite') !!}

{!! Form::date('fecha_fin',null,['class'=>'form-control', 'min'=>'2017-01-01']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('Monto','Monto') !!}
        {!! Form::number('monto',null,['class'=>'form-control', 'placeholder'=>'$']) !!}
        </div>

        {!! Form::hidden('direccion','real_path',['class'=>'form-control']) !!}



        {!! Form::submit('Actualizar',['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}


        {!! Form::open(['route'=> ['adquisicion.destroy', $adquisicion->id], 'method'=>'DELETE']) !!}
        <br>
        {!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
