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
    <div class="col-md-4 col-sm-4 col-lg-8" ></div>
    <div class="col-md-4 col-sm-4 col-lg-8">
      <div class="panel panel-default">
        <div class="panel-body">
          <!--form start-->
          <form class="form-container">
            <!--<h1>Registro de Usuarios</h1>-->
            <legend>Lista de Municipios</legend>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Municipio</th>
                  <th>Acción</th>
                </tr>
              </thead>
              @foreach($municipios as $municipio)
              <tbody>
                <td>{{$municipio->municipio}}</td>
                <td>
                  <!--<a class="btn btn-primary btn-sm" >Editar</a>-->
                  <!--<button class="btn btn-danger btn-sm">Eliminar</button>-->
                  {!!link_to_route('municipio.edit', $title='Editar', $parameters = $municipio -> id, $attributes=['class'=>'btn btn-primary'])!!}
                </td>
              </tbody>
              @endforeach
            </table>
            {!! $municipios -> render() !!}
          </form>
          <!--form end-->
        </div>
      </div>
    </div>
  </div>

  @endsection