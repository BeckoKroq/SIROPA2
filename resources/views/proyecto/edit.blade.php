@extends('layout.admin')

@section('content')

@include('alerts.request')

<br>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">

        {!! Form::model($proyecto,['route'=>['proyecto.update', $proyecto->id], 'method'=>'PUT']) !!}

        <legend>Editar Proyecto</legend>

        <div class="form-group">
          {!! Form::label('Nombre','Nombre del Obra Pública') !!}
          {!! Form::text('nombre_proyecto',null,['class'=>'form-control', 'placeholder'=>'Nombre del Proyecto']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Numero','Número del Contrato') !!}
          {!! Form::text('numero_proyecto',null,['class'=>'form-control', 'placeholder'=>'Número del Proyecto','pattern'=>"[0-9]{1-30}"]) !!}
        </div>

        <div class="form-group">

          {!! Form::hidden('region') !!}
        </div>

        <div class="form-group">

          {!! Form::hidden('municipio_id') !!}
        </div>

        <div class="form-group">
          {!! Form::label('Localidad','Localidad') !!}
          {!! Form::text('localidad',null,['class'=>'form-control', 'placeholder'=>'Localidad']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('Monto','Monto') !!}
        {!! Form::number('monto',null,['class'=>'form-control', 'placeholder'=>'$']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('Fecha_inicio','Fecha de Inicio') !!}
        {!! Form::date('fecha_inicio',null,['class'=>'form-control', 'min'=>'2017-01-01']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('Fecha_final','Fecha de Limite') !!}
        {!! Form::date('fecha_fin',null,['class'=>'form-control', 'min'=>'2017-01-01']) !!}
        </div>

        <div class="form-group">
          @foreach ($empresas as $id => $razon_social)
            <label>
              <input type="checkbox" value="{{$id}}" name="empresas[]">
              {{$razon_social}}
            </label>
          @endforeach

        </div>




        {!! Form::hidden('direccion','real_path',['class'=>'form-control']) !!}



        {!! Form::submit('Actualizar',['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}


        {!! Form::open(['route'=> ['proyecto.destroy', $proyecto->id], 'method'=>'DELETE']) !!}
        <br>
        {!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
