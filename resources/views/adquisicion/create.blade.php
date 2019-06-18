@extends('layout.admin')

@section('content')

@include('alerts.request')
<br>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">

        {!! Form::open(['route'=>'adquisicion.store', 'method'=>'POST']) !!}

        <legend>Crear Adquisición</legend>

        <div class="form-group">
          {!! Form::label('Nombre','Nombre de la Adquisición') !!}
          {!! Form::text('nombre_adquisicion',null,['class'=>'form-control', 'placeholder'=>'Nombre de la Adquisición']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Numero','Número del Contrato') !!}
          {!! Form::text('numero_adquisicion',null,['class'=>'form-control', 'placeholder'=>'Número de la Adquisición']) !!}
        </div>

        <div class="form-group">

        {!! Form::hidden('region', auth()->user()->region) !!}
        </div>


        <div class="form-group">

        {!! Form::hidden('municipio_id', auth()->user()->municipio) !!}
        </div>

        <div class="form-group">
        {!! Form::label('Localidad','Localidad') !!}
        {!! Form::text('localidad',null,['class'=>'form-control', 'placeholder'=>'Localidad' ,'pattern'=>"[A-Za-záéíóúüñ-0-9]{4-30}"]) !!}
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

        <div class="form-group">
          {!! Form::label('Modalidad','Modalidad') !!}
          {!! Form::select('modalidad',['placeholder'=>'--Seleccione Modalidad--','Directa'=>'Directa','Contrato'=>'Contrato','Licitación'=>'Licitación']) !!}
        </div>

        {!! Form::hidden('direccion','real_path',['class'=>'form-control']) !!}
        {!! Form::hidden('Fase 1','Fase 1',['class'=>'form-control']) !!}
        {!! Form::hidden('Fase 2','Fase 2',['class'=>'form-control']) !!}
        {!! Form::hidden('Fase 3','Fase 3',['class'=>'form-control']) !!}

        <br>
        {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
        {!! Form::reset('Borrar',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
