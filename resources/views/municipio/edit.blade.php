@extends('layout.admin')

@section('content')

@include('alerts.request')

<?php

    //print_r( json_encode($user));
?>
<br>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        {!! Form::model($municipio,['route'=>['municipio.update', $municipio->id], 'method'=>'PUT']) !!}
        <legend>Editar Municipio</legend>
        <div id="msj-success" class="alert alert-success alert-dismissible" role="alert"
        style="display:none">
        <strong>Municipio Aregado Correctamente</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      {!! Form::label('municipio','Municipio') !!}
      {!! Form::text('municipio',null,['id'=>'municipio','class'=>'form-control', 'placeholder'=>'Municipio']) !!}
      <br>
      {!! Form::submit('Actualizar',['class'=>'btn btn-success']) !!}

      {!! Form::close() !!}


      {!! Form::open(['route'=> ['municipio.destroy', $municipio->id], 'method'=>'DELETE']) !!}
      <br>
      {!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}

      {!! Form::close() !!}
    </div>
  </div>
</div>
</div>

@endsection