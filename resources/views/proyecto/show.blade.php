@php
  use Illuminate\Support\Facades\DB;
@endphp

@extends('layout.admin')

@section('content')

@include('alerts.request')



<br>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <br>
        <legend>Vista de Proyecto</legend>
        <br>

        <form>
          <fieldset class="form-group">
            <label for="Nombre del proyecto">Obra Pública</label>
            <p>
              <mark>{{$proyecto->nombre_proyecto}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Numero de proyecto">Número de contrato</label>
            <p>
              <mark>{{$proyecto->numero_proyecto}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Region">Región</label>
            <p>
              <mark>{{$proyecto->region}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Municipio">Municipio</label>
            @php
                  $municipio = DB::table('municipios')->where('id',$proyecto->municipios_id)->pluck('municipio');
            @endphp
            <p>
              <mark>{{ $municipio[0] }}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Localidad">Localidad</label>
            <p>
              <mark>{{$proyecto->localidad}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Fecha Inicio">Fecha inicio</label>
            <p>
              <mark>{{$proyecto->fecha_inicio}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Fecha Fin">Fecha fin</label>
            <p>
              <mark>{{$proyecto->fecha_fin}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Modalidad">Modalidad</label>
            <p>
              <mark>{{$proyecto->modo_proyecto}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Monto">Monto</label>
            <p>
              <mark>{{$proyecto->monto}}</mark>
            </p>
          </fieldset>

          <div class="form-group">
            @foreach ($empresas as $id => $razon_social)
              <label>
                <input type="checkbox" value="{{$id}}" name="empresas[]">
                {{$razon_social}}
              </label>
            @endforeach

          </div>
        </form>


        <td class="col-md-3">

            <div class="btn-group-vertical">
              {!!link_to_route('faseuno.edit', $title='Fase 1', $parameters = $proyecto -> id, $attributes=['class'=>'btn btn-primary'])!!}
              @php
                $totalCheck= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto->id)->pluck('permiso_check');
                $totalAcept= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto->id)->where('aceptado','1')->pluck('aceptado');
                if((count($totalAcept)==count($totalCheck))and(count($totalAcept)!=0)and(count($totalCheck)!=0)){
              @endphp
                  {!!link_to_route('fasedos.edit', $title='Fase 2', $parameters = $proyecto -> id, $attributes=['class'=>'btn btn-primary'])!!}
              @php
                }
                $totalCheck= DB::table('fase_dos')->where('obras_publicas_id', $proyecto->id)->pluck('permiso_check');
                $totalAcept= DB::table('fase_dos')->where('obras_publicas_id', $proyecto->id)->where('aceptado','1')->pluck('aceptado');
                if((count($totalAcept)==count($totalCheck))and(count($totalAcept)!=0)and(count($totalCheck)!=0)){
              @endphp
              {!!link_to_route('fasetres.edit', $title='Fase 3', $parameters = $proyecto -> id, $attributes=['class'=>'btn btn-primary'])!!}
              @php
                }
              @endphp

            </div>

            {!!link_to_route( 'VistaPDF.show' ,$title=' Reporte', $parameters = $proyecto -> id, $attributes=['class'=>'btn btn-success far fa-file-pdf'])!!}

            {!!link_to_route( 'Zip.show' ,$title=' Descargar', $parameters = $proyecto -> id, $attributes=['class'=>'btn btn-primary far fa-file-archive'])!!}

            {!!link_to_route( 'constructora.create' ,$title=' Crear Constructora', $attributes=['class'=>'btn btn-primary'])!!}

        </td>
      </div>
    </div>
  </div>
</div>
@include('sweet::alert')

@endsection
