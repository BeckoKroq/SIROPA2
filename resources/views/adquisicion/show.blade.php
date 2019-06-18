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
        <legend>Vista de Adquisición</legend>
        <br>

        <form>
          <fieldset class="form-group">
            <label for="Nombre del adquisicion">Adquisición</label>
            <p>
              <mark>{{$adquisicion->nombre_adquisicion}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Numero de adquisicion">Número de contrato</label>
            <p>
              <mark>{{$adquisicion->numero_adquisicion}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Region">Región</label>
            <p>
              <mark>{{$adquisicion->region}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Municipio">Municipio</label>
            <p>
              @php
                $municipio = DB::table('municipios')->where('id',$adquisicion->municipios_id)->pluck('municipio');
              @endphp
              <mark>{{$municipio[0]}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Localidad">Localidad</label>
            <p>
              <mark>{{$adquisicion->localidad}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Fecha Inicio">Fecha inicio</label>
            <p>
              <mark>{{$adquisicion->fecha_inicio}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Fecha Fin">Fecha fin</label>
            <p>
              <mark>{{$adquisicion->fecha_fin}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Modalidad">Modalidad</label>
            <p>
              <mark>{{$adquisicion->modo_adquisicion}}</mark>
            </p>
          </fieldset>
          <fieldset class="form-group">
            <label for="Monto">Monto</label>
            <p>
              <mark>{{$adquisicion->monto}}</mark>
            </p>
          </fieldset>


        </form>


        <td class="col-md-3">

            <div class="btn-group-vertical">
              {!!link_to_route('faseuno_adq.edit', $title='Fase 1', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-primary'])!!}
              @php
                $totalCheck= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion->id)->pluck('permiso_check');
                $totalAcept= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion->id)->where('aceptado','1')->pluck('aceptado');
                if((count($totalAcept)==count($totalCheck))and(count($totalAcept)!=0)and(count($totalCheck)!=0)){
              @endphp
                  {!!link_to_route('fase_dos_adq.edit', $title='Fase 2', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-primary'])!!}
              @php
                }
                $totalCheck= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion->id)->pluck('permiso_check');
                $totalAcept= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion->id)->where('aceptado','1')->pluck('aceptado');
                if((count($totalAcept)==count($totalCheck))and(count($totalAcept)!=0)and(count($totalCheck)!=0)){
              @endphp
              {!!link_to_route('fasetres_adq.edit', $title='Fase 3', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-primary'])!!}
              @php
                }
              @endphp

            </div>

            {!!link_to_route( 'VistaPDF.edit' ,$title=' Reporte', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-success far fa-file-pdf'])!!}

            {!!link_to_route( 'Zip.edit' ,$title=' Descargar', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-primary far fa-file-archive'])!!}

            {!!link_to_route( 'constructora.create' ,$title=' Crear Constructora', $attributes=['class'=>'btn btn-primary'])!!}

        </td>
      </div>
    </div>
  </div>
</div>
@include('sweet::alert')

@endsection
