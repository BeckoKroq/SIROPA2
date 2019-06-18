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

        <legend><?php
          $nombre=DB::table('adquisicions')->where('id',$adquisicion->id)->pluck('nombre_adquisicion');
          //dd($nombre);
          echo $nombre[0];
        ?>
      </legend>
        <legend>Vista de Adquisiciónes</legend>


        <td class="col-md-3">

            <div class="btn-group-vertical">
              {!!link_to_route('faseuno_adq.edit', $title='Fase 1', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-primary'])!!}
              @php
                $totalCheck1= DB::table('_fase_uno_adq')->where('obras_publicas_id', $adquisicion->id)->pluck('permiso_check');
                $totalAcept1= DB::table('_fase_uno_adq')->where('obras_publicas_id', $adquisicion->id)->where('aceptado','1')->pluck('aceptado');
                if((count($totalAcept1)==count($totalCheck1))and(count($totalAcept1)!=0)and(count($totalCheck1)!=0)){
              @endphp
                  {!!link_to_route('fasedos_adq.edit', $title='Fase 2', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-primary'])!!}
              @php
                }
                $totalCheck= DB::table('fase_dos_adq')->where('obras_publicas_id', $adquisicion->id)->pluck('permiso_check');
                $totalAcept= DB::table('fase_dos_adq')->where('obras_publicas_id', $adquisicion->id)->where('aceptado','1')->pluck('aceptado');
                if((count($totalAcept)==count($totalCheck))and(count($totalAcept)!=0)and(count($totalCheck)!=0)){
              @endphp
              {!!link_to_route('fasetres_adq.edit', $title='Fase 3', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-primary'])!!}
              @php
                }
              @endphp

            </div>

            {!!link_to_route( 'VistaPDF.show2' ,$title=' Reporte', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-success far fa-file-pdf'])!!}

            {!!link_to_route( 'Zip.show' ,$title=' Descargar', $parameters = $adquisicion -> id, $attributes=['class'=>'btn btn-primary far fa-file-archive'])!!}

        </td>





      </div>
    </div>
  </div>
</div>
@include('sweet::alert')

@endsection
