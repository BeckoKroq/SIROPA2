@extends('layout.admin')


@section('content')


@include('alerts.request')


<br>
<div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">

          {!! Form::open(['route'=>'constructora.store', 'method'=>'POST']) !!}

          <legend>Crear Empresa</legend>
           {{ csrf_field() }}

          <div class="form-group">
            {!! Form::label('Nombre','Nombre de la Empresa') !!}
                {!! Form::text('razon_social',null,['class'=>'form-control', 'placeholder'=>'Nombre de la Empresa']) !!}
                    </div>

                              <div class="form-group">
                              {!! Form::label('Domicilio','Domicilio') !!}
                              {!! Form::text('domicilio',null,['class'=>'form-control', 'placeholder'=>'Domicilio' ]) !!}
                              </div>

                              <div class="form-group">
                              {!! Form::label('Telefono','Telefono') !!}
                              {!! Form::number('telefono',null,['class'=>'form-control', 'placeholder'=>'Telefono' ]) !!}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Correo','Correo') !!}
                                {!! Form::email('correo',null,['class'=>'form-control', 'placeholder'=>'Correo']) !!}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Estado','Estado') !!}
                                {!! Form::text('estado',null,['class'=>'form-control', 'placeholder'=>'Estado']) !!}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Municipio','Municipio') !!}
                                {!! Form::text('municipio',null,['class'=>'form-control', 'placeholder'=>'Municipio']) !!}
                              </div>

                              <div class="form-group">
                                {!! Form::label('RFC','RFC') !!}
                                {!! Form::text('rfc',null,['class'=>'form-control', 'placeholder'=>'RFC']) !!}
                              </div>


                              <br>
                              {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}

                              {!! Form::reset('Borrar',['class'=>'btn btn-primary']) !!}

                              {!! Form::close() !!}
                              </div>
                            </div>
                          </div>
                        </div>

</div>

@endsection
