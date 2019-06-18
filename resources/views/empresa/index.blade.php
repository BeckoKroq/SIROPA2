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
            <legend>Lista de Empresas</legend>
            {!!Form::open(['route'=>'constructora.index', 'method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
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
                  <th>#</th>
                  <th>Empresa</th>
                  <th>Domicilio</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>RFC</th>

                  <th>Opciones</th>
                </tr>
              </thead>
              @foreach($empresas as $empresa)
              <tbody>
                <td>{{$empresa->id}}</td>
                <td>{{$empresa->razon_social}}</td>
                <td>{{$empresa->domicilio}}</td>
                <td>{{$empresa->telefono}}</td>
                <td>{{$empresa->correo}}</td>
                <td>{{$empresa->estado}}</td>
                <td>{{$empresa->municipio}}</td>
                <td>{{$empresa->rfc}}</td>
                <td>
                  {!!link_to_route('constructora.edit', $title='Editar', $parameters = $empresa -> id, $attributes=['class'=>'btn btn-primary'])!!}
                </td>
                <td>
                  {!!link_to_route('proyecto.update', $title='Agregar', $parameters = $empresa -> id, $attributes=['class'=>'btn btn-success'])!!}
                </td>

              </tbody>
              @endforeach
            </table>
            {!! $empresas -> render() !!}
          </form>
          <!--form end-->
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
