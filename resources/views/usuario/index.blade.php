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
            <legend>Lista de Usuarios</legend>
            {!!Form::open(['route'=>'proyecto.index', 'method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
              <div class="input-group">
                {!!Form::text('nombre', null,['class'=>'form-control', 'placelholder'=>'Buscar...', 'aria-describedby'=>'search'])!!}
                <span class="input-group-addon" id="search">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </span>
              </div>
            {!!Form::close()!!}
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Clave Funcionario</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Municipio</th>
                  <th>Acción</th>
                </tr>
              </thead>
              @foreach($users as $user)
              <tbody>
                <td>{{$user->nombre}}</td>
                <td>{{$user->clave_fun}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->telefono}}</td>
                <td>{{$user->direccion}}</td>
                <td>{{$user->municipio}}</td>
                <td>
                  <!--<a class="btn btn-primary btn-sm" >Editar</a>-->
                  <!--<button class="btn btn-danger btn-sm">Eliminar</button>-->
                  {!!link_to_route('usuario.edit', $title='Editar', $parameters = $user -> id, $attributes=['class'=>'btn btn-primary'])!!}
                </td>
              </tbody>
              @endforeach
            </table>
            {!! $users -> render() !!}
          </form>
          <!--form end-->
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
