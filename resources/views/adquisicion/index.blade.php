@extends('layout.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{Session::get('message')}}
</div>
@endif

@section('content')
<br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-sm-4 col-lg-12" ></div>
    <div class="col-md-4 col-sm-4 col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <!--form start-->
          <form class="form-container">
            <!--<h1>Registro de Usuarios</h1>-->
            <legend>Lista de Adqusiciones</legend>
            {!!Form::open(['route'=>'adquisicion.index', 'method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
              <div class="input-group">
                {!!Form::text('nombre_adquisicion', null,['class'=>'form-control', 'placelholder'=>'Buscar...', 'aria-describedby'=>'search'])!!}
                <span class="input-group-addon" id="search">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </span>
              </div>
            {!!Form::close()!!}
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Adquisición</th>
                  <th>Número de contrato</th>
                  <th>Región</th>
                  <th>Municipio</th>
                  <th>Localidad</th>
                  <th>Fecha inicio</th>
                  <th>Fecha fin</th>
                  @if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
                    <th>Acción</th>
                  @endif
                  <th>Ver</th>
                </tr>
              </thead>
              @foreach($selection as $adquisicion)
              <tbody>
                <td>{{$adquisicion->nombre_adquisicion}}</td>
                <td>{{$adquisicion->numero_adquisicion}}</td>
                <td>{{$adquisicion->region}}</td>
                @php
                  $municipio = DB::table('municipios')->where('id',$adquisicion->municipios_id)->pluck('municipio');
                @endphp
                <td>{{ $municipio[0]}}</td>
                <td>{{$adquisicion->localidad}}</td>
                <td>{{$adquisicion->fecha_inicio}}</td>
                <td>{{$adquisicion->fecha_fin}}</td>
                @if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
                    <td>
                      {!!link_to_route('adquisicion.edit', $title='Editar', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-primary'])!!}
                    </td>
                @endif
                <td class="col-md-3">

                  {!!link_to_route('adquisicion.show', $title='Ver Adquisicion', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-success'])!!}
                </td>
              </tbody>
              @endforeach
            </table>
            {!! $selection -> render() !!}
          </form>
          <!--form end-->
        </div>
      </div>
    </div>
  </div>

  @endsection
