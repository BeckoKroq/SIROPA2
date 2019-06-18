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
            <legend>Lista de Proyectos</legend>
            {!!Form::open(['route'=>'proyecto.index', 'method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
              <div class="input-group">
                {!!Form::text('nombre_proyecto', null,['class'=>'form-control', 'placelholder'=>'Buscar...', 'aria-describedby'=>'search'])!!}
                <span class="input-group-addon" id="search">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </span>
              </div>
            {!!Form::close()!!}
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Proyecto</th>
                  <th>Número</th>
                  <th>Región</th>
                  <th>Municpio</th>
                  <th>Localidad</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  @if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
                    <th>Acción</th>
                  @endif
                  <th>Ver</th>
                </tr>
              </thead>
              @foreach($selection as $proyecto)
              <tbody>
                <td>{{$proyecto->nombre_proyecto}}</td>
                <td>{{$proyecto->numero_proyecto}}</td>
                <td>{{$proyecto->region}}</td>
                @php
                  $municipio = DB::table('municipios')->where('id',$proyecto->municipios_id)->pluck('municipio');
                @endphp
                <td>{{$municipio[0]}}</td>
                <td>{{$proyecto->localidad}}</td>
                <td>{{$proyecto->fecha_inicio}}</td>
                <td>{{$proyecto->fecha_fin}}</td>
                @if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
                    <td>
                      {!!link_to_route('proyecto.edit', $title='Editar', $parameters = $proyecto -> id, $attributes=['class'=>'btn btn-primary'])!!}
                    </td>
                @endif
                <td class="col-md-3">

                  {!!link_to_route('proyecto.show', $title='Ver Proyecto', $parameters = $proyecto -> id, $attributes=['class'=>'btn btn-success'])!!}
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
</div>
</div>

@endsection
