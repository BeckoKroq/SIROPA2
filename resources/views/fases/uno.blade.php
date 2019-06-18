@extends('layout.admin')
@section('content')
  <meta charset="UTF-8">
  {!! csrf_field() !!}

  <div class="container background-white">
      <div class="row">
          <div class="col-md-12 background-white">
              <div class="alert alert-info text-center font-weight " >
                  <?php use Illuminate\Support\Facades\DB; ?>
                  <h2><?php $Nom= DB::table('proyectos')->where('id', $proyecto)->pluck('nombre_proyecto');
                        echo $Nom[0];
                  ?> </h2>
              </div>

              <link rel="stylesheet" href="/sweetalert2/dist/sweetalert2.css">
              <script src="/sweetalert2/dist/sweetalert2.all.js"></script>
              <script src="/vendor/sweetalert/sweetalert.all.js"></script>
              <script language="JavaScript">
                function habilita(){
                    $(".inputText").removeAttr("disabled");
                }
                function deshabilita(){
                    $(".inputText").attr("disabled","disabled");
                }
                function habilita2(){
                    $(".inputText2").removeAttr("disabled");
                }
                function deshabilita2(){
                    $(".inputText2").attr("disabled","disabled");
                }
                function habilita3(){
                    $(".inputText3").removeAttr("disabled");
                }
                function deshabilita3(){
                    $(".inputText3").attr("disabled","disabled");
                }
                function habilita4(){
                    $(".inputText4").removeAttr("disabled");
                }
                function deshabilita4(){
                    $(".inputText4").attr("disabled","disabled");
                }
                function habilita5(){
                    $(".inputText5").removeAttr("disabled");
                }
                function deshabilita5(){
                    $(".inputText5").attr("disabled","disabled");
                }
                function habilita6(){
                    $(".inputText6").removeAttr("disabled");
                }
                function deshabilita6(){
                    $(".inputText6").attr("disabled","disabled");
                }
                function habilita7(){
                    $(".inputText7").removeAttr("disabled");
                }
                function deshabilita7(){
                    $(".inputText7").attr("disabled","disabled");
                }
                function habilita8(){
                    $(".inputText8").removeAttr("disabled");
                }
                function deshabilita8(){
                    $(".inputText8").attr("disabled","disabled");
                }
                function habilita9(){
                    $(".inputText9").removeAttr("disabled");
                }
                function deshabilita9(){
                    $(".inputText9").attr("disabled","disabled");
                }
                function habilita10(){
                    $(".inputText10").removeAttr("disabled");
                }
                function deshabilita10(){
                    $(".inputText10").attr("disabled","disabled");
                }
                function habilita11(){
                    $(".inputText11").removeAttr("disabled");
                }
                function deshabilita11(){
                    $(".inputText11").attr("disabled","disabled");
                }
                function habilita12(){
                    $(".inputText12").removeAttr("disabled");
                }
                function deshabilita12(){
                    $(".inputText12").attr("disabled","disabled");
                }
                function habilita13(){
                    $(".inputText13").removeAttr("disabled");
                }
                function deshabilita13(){
                    $(".inputText13").attr("disabled","disabled");
                }
                function habilita14(){
                    $(".inputText14").removeAttr("disabled");
                }
                function deshabilita14(){
                    $(".inputText14").attr("disabled","disabled");
                }
                function habilita15(){
                    $(".inputText15").removeAttr("disabled");
                }
                function deshabilita15(){
                    $(".inputText15").attr("disabled","disabled");
                }
                function habilita16(){
                    $(".inputText16").removeAttr("disabled");
                }
                function deshabilita16(){
                    $(".inputText16").attr("disabled","disabled");
                }
                function habilita17(){
                    $(".inputText17").removeAttr("disabled");
                }
                function deshabilita17(){
                    $(".inputText17").attr("disabled","disabled");
                }
                function habilita18(){
                    $(".inputText18").removeAttr("disabled");
                }
                function deshabilita18(){
                    $(".inputText18").attr("disabled","disabled");
                }
                function habilita19(){
                    $(".inputText19").removeAttr("disabled");
                }
                function deshabilita19(){
                    $(".inputText19").attr("disabled","disabled");
                }
                function habilita20(){
                    $(".inputText20").removeAttr("disabled");
                }
                function deshabilita20(){
                    $(".inputText20").attr("disabled","disabled");
                }
              </script>
              {!!link_to_route('proyecto.show', $title='Regresar a proyecto', $parameters = $proyecto, $attributes=['class'=>'btn btn-success sm'])!!}
              <br></br>

             {{-- < link rel="stylesheet" type="text/css" href="../../AdminStyle/css/Option.css"> --}}
              <div class="alert alert-info text-center font-weight" >
                  Etapa Planeación y Programación</div>
              <table class="table">
                @include('alerts.request')
                  <thead>
                      <tr class="success">
                          <td>Aplica/No Aplica</td>
                          <th></th>
                          <th>Documento</th>
                          <th>Ver</th>
                          <th>Estado del Archivo</th>
                          <th>Nota</th>
                          <th>Fecha Límite</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="active ">
                          {!! Form::open(['route'=>['boton1',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                              $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb' class="default"></div>
                              @endif
                          </td>
                          <td>1</td>
                          <td>Oficio de Aprobación con Anexos Técnicos</td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('path_file_pdf')?>
                          <?php $pdf1 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('path_file_pdf')?>
                                  @for($i=0; $i<=count($list_pdf); $i++)
                                      @if($i == count($list_pdf))
                                          <?php $pdf1 = $list_pdf[$i-1]?>
                                      @endif
                                  @endfor
                              <td>
                                  <a href="#popup_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('aceptado');
                                   ?>
                                   <span class="customRadio">
                                        @if($estado[0]=='1')
                                            <input type="radio" name="options1" value="1" id="radio-one" checked disabled><label for="radio-one">A</label>
                                            <input type="radio" name="options1" value="2" id="radio-dos" disabled><label for="radio-dos">E</label>
                                            <input type="radio" name="options1" value="0" id="radio-tres" disabled><label for="radio-tres">NA</label>
                                        @endif
                                        @if($estado[0]=='0')
                                            <input type="radio" name="options1" value="1" id="radio-one" onclick="deshabilita()"><label for="radio-one">A</label>
                                            <input type="radio" name="options1" value="2" id="radio-dos" onclick="deshabilita()" ><label for="radio-dos">E</label>
                                            <input type="radio" name="options1" value="0" id="radio-tres" checked onclick="habilita()"><label for="radio-tres">NA</label>
                                        @endif
                                        @if($estado[0]=='2')
                                            <input type="radio" name="options1" value="1" id="radio-one" onclick="deshabilita()"><label for="radio-one">A</label>
                                            <input type="radio" name="options1" value="2" id="radio-dos" onclick="deshabilita()" checked><label for="radio-dos">E</label>
                                            <input type="radio" name="options1" value="0" id="radio-tres" onclick="habilita()"><label for="radio-tres">NA</label>
                                        @endif
                                   </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion1',null,['class'=>'inputText text', 'disabled' => 'disabled', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha1',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                  <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('fecha_lim');
                                      //dd($fecha);
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha1',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha1',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='1'?>
                          @endif
                          <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('aceptado');
                              //echo count($estado);
                             //dd($estado);
                          ?>
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif

                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>
                  </tbody>
                      <thead>
                          <tr class="success">
                              <td></td>
                              <th>2</th>
                              <th>Cédula de Información</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                      </thead>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton2',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                              $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb2' class="default"></div>
                              @endif
                          </td>
                          <td>2.1</td>
                          <td>Cédula de Información Básica</td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('path_file_pdf')?>
                          <?php $pdf2 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf2 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup2_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>

                                <td>
                                    <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('aceptado');
                                     ?>
                                     <span class="customRadio">
                                        @if($estado[0]=='1')
                                            <input type="radio" name="options2" value="1" id="radio-one2" checked disabled><label for="radio-one2">A</label>
                                            <input type="radio" name="options2" value="2" id="radio-dos2" disabled><label for="radio-dos2">E</label>
                                            <input type="radio" name="options2" value="0" id="radio-tres2" disabled><label for="radio-tres2">NA</label>
                                        @endif
                                        @if($estado[0]=='0')
                                            <input type="radio" name="options2" value="1" id="radio-one2" onclick="deshabilita2()"><label for="radio-one2">A</label>
                                            <input type="radio" name="options2" value="2" id="radio-dos2"  onclick="deshabilita2()" ><label for="radio-dos2">E</label>
                                            <input type="radio" name="options2" value="0" id="radio-tres2" checked onclick="habilita2()"><label for="radio-tres2">NA</label>
                                        @endif
                                        @if($estado[0]=='2')
                                            <input type="radio" name="options2" value="1" id="radio-one2" onclick="deshabilita2()"><label for="radio-one2">A</label>
                                            <input type="radio" name="options2" value="2" id="radio-dos2" onclick="deshabilita2()" checked><label for="radio-dos2">E</label>
                                            <input type="radio" name="options2" value="0" id="radio-tres2"  onclick="habilita2()"><label for="radio-tres2">NA</label>
                                        @endif
                                    </span>
                                </td>

                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion2',null,['disabled' => 'disabled','class'=>'inputText2 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha2',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha2',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td><td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha2',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha2',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton3',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                           @php
                              $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb3' class="default"></div>
                              @endif
                          </td>
                          <td>2.2</td>
                          <td>Catálogo de Conceptos Preliminares</td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('path_file_pdf')?>
                          <?php $pdf3 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf3 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup3_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('aceptado');
                                   ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options3" value="1" id="radio-one3" checked disabled><label for="radio-one3">A</label>
                                        <input type="radio" name="options3" value="2" id="radio-dos3" disabled><label for="radio-dos3">E</label>
                                        <input type="radio" name="options3" value="0" id="radio-tres3" disabled><label for="radio-tres3">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options3" value="1" id="radio-one3" onclick="deshabilita2()"><label for="radio-one3">A</label>
                                        <input type="radio" name="options3" value="2" id="radio-dos3" onclick="deshabilita3()" ><label for="radio-dos3">E</label>
                                        <input type="radio" name="options3" value="0" id="radio-tres3" checked onclick="habilita3()"><label for="radio-tres3">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options3" value="1" id="radio-one3" onclick="deshabilita3()"><label for="radio-one3">A</label>
                                        <input type="radio" name="options3" value="2" id="radio-dos3" onclick="deshabilita3()" checked><label for="radio-dos3">E</label>
                                        <input type="radio" name="options3" value="0" id="radio-tres3" onclick="habilita3()"><label for="radio-tres3">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion3',null,['disabled' => 'disabled','class'=>'inputText3 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha3',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha3',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                  <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha3',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha3',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton4',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb4' class="default"></div>
                              @endif
                          </td>
                          <td>2.3</td>
                          <td>Calendarización Preliminar</td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('path_file_pdf')?>
                          <?php $pdf4 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf4 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup4_f1" class="far fa-file-pdf fa-2x" style="color:red" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('aceptado');
                                   ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options4" value="1" id="radio-one4" checked disabled><label for="radio-one4">A</label>
                                        <input type="radio" name="options4" value="2" id="radio-dos4" disabled><label for="radio-dos4">E</label>
                                        <input type="radio" name="options4" value="0" id="radio-tres4" disabled><label for="radio-tres4">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options4" value="1" id="radio-one4" onclick="deshabilita4()"><label for="radio-one4">A</label>
                                        <input type="radio" name="options4" value="2" id="radio-dos4" onclick="deshabilita4()" ><label for="radio-dos4">E</label>
                                        <input type="radio" name="options4" value="0" id="radio-tres4" checked onclick="habilita4()"><label for="radio-tres4">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options4" value="1" id="radio-one4" onclick="deshabilita4()"><label for="radio-one4">A</label>
                                        <input type="radio" name="options4" value="2" id="radio-dos4" onclick="deshabilita4()" checked><label for="radio-dos4">E</label>
                                        <input type="radio" name="options4" value="0" id="radio-tres4" onclick="habilita4()"><label for="radio-tres4">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion4',null,['disabled' => 'disabled','class'=>'inputText4 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha4',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha4',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                  <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha4',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha4',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton5',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                           @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb5' class="default"></div>
                              @endif
                          </td>
                          <td>2.4</td>
                          <td>Validación y Dictamen de Factibilidad</td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('path_file_pdf')?>
                          <?php $pdf5 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('path_file_pdf')?>

                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf5 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup5_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>

                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('aceptado');
                                   ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options5" value="1" id="radio-one5" checked disabled><label for="radio-one5">A</label>
                                        <input type="radio" name="options5" value="2" id="radio-dos5" disabled><label for="radio-dos5">E</label>
                                        <input type="radio" name="options5" value="0" id="radio-tres5" disabled><label for="radio-tres5">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options5" value="1" id="radio-one5" onclick="deshabilita5()"><label for="radio-one5">A</label>
                                        <input type="radio" name="options5" value="2" id="radio-dos5" onclick="deshabilita5()" ><label for="radio-dos5">E</label>
                                        <input type="radio" name="options5" value="0" id="radio-tres5" checked onclick="habilita5()"><label for="radio-tres5">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options5" value="1" id="radio-one5" onclick="deshabilita5()"><label for="radio-one5">A</label>
                                        <input type="radio" name="options5" value="2" id="radio-dos5" onclick="deshabilita5()" checked><label for="radio-dos5">E</label>
                                        <input type="radio" name="options5" value="0" id="radio-tres5" onclick="habilita5()"><label for="radio-tres5">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion5',null,['disabled' => 'disabled','class'=>'inputText5 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha5',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha5',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha5',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha5',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton6',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                           @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb6' class="default"></div>
                              @endif
                          </td>
                          <td>2.5</td>
                          <td>Croquis de Localización de la Obra</td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('path_file_pdf')?>
                          <?php $pdf6 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf6 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup6_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options6" value="1" id="radio-one6" checked disabled><label for="radio-one6">A</label>
                                        <input type="radio" name="options6" value="2" id="radio-dos6" disabled><label for="radio-dos6">E</label>
                                        <input type="radio" name="options6" value="0" id="radio-tres6" disabled><label for="radio-tres6">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options6" value="1" id="radio-one6" onclick="deshabilita6()"><label for="radio-one6">A</label>
                                        <input type="radio" name="options6" value="2" id="radio-dos6" onclick="deshabilita6()" ><label for="radio-dos6">E</label>
                                        <input type="radio" name="options6" value="0" id="radio-tres6" checked onclick="habilita6()"><label for="radio-tres6">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options6" value="1" id="radio-one6" onclick="deshabilita6()"><label for="radio-one6">A</label>
                                        <input type="radio" name="options6" value="2" id="radio-dos6" onclick="deshabilita6()" checked><label for="radio-dos6">E</label>
                                        <input type="radio" name="options6" value="0" id="radio-tres6" onclick="habilita6()"><label for="radio-tres6">NA</label>
                                    @endif
                                  </span>
                               </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion6',null,['disabled' => 'disabled','class'=>'inputText6 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha6',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha6',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha6',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha6',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton7',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                           @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb7' class="default"></div>
                              @endif
                          </td>
                          <td>2.6</td>
                          <td>Proyecto de la Obra</td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('path_file_pdf')?>
                          <?php $pdf7 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf7 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                             <td>
                                  <a href="#popup7_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options7" value="1" id="radio-one7" checked disabled><label for="radio-one7">A</label>
                                        <input type="radio" name="options7" value="2" id="radio-dos7" disabled><label for="radio-dos7">E</label>
                                        <input type="radio" name="options7" value="0" id="radio-tres7" disabled><label for="radio-tres7">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options7" value="1" id="radio-one7" onclick="deshabilita7()"><label for="radio-one7">A</label>
                                        <input type="radio" name="options7" value="2" id="radio-dos7" onclick="deshabilita7()" ><label for="radio-dos7">E</label>
                                        <input type="radio" name="options7" value="0" id="radio-tres7" checked onclick="habilita7()"><label for="radio-tres7">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options7" value="1" id="radio-one7" onclick="deshabilita7()"><label for="radio-one7">A</label>
                                        <input type="radio" name="options7" value="2" id="radio-dos7" onclick="deshabilita7()" checked><label for="radio-dos7">E</label>
                                        <input type="radio" name="options7" value="0" id="radio-tres7" onclick="habilita7()"><label for="radio-tres7">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion2',null,['disabled' => 'disabled','class'=>'inputText7 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha7',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha7',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha7',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha7',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton8',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb8' class="default"></div>
                              @endif
                          </td>
                          <td>2.7</td>
                          <td>Permiso de la Obra </td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('path_file_pdf')?>
                          <?php $pdf8 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf8 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup8_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('aceptado');
                                   ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options8" value="1" id="radio-one8" checked disabled><label for="radio-one8">A</label>
                                        <input type="radio" name="options8" value="2" id="radio-dos8" disabled><label for="radio-dos8">E</label>
                                        <input type="radio" name="options8" value="0" id="radio-tres8" disabled><label for="radio-tres8">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options8" value="1" id="radio-one8" onclick="deshabilita8()"><label for="radio-one8">A</label>
                                        <input type="radio" name="options8" value="2" id="radio-dos8" onclick="deshabilita8()" ><label for="radio-dos8">E</label>
                                        <input type="radio" name="options8" value="0" id="radio-tres8" checked onclick="habilita8()"><label for="radio-tres8">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options8" value="1" id="radio-one8" onclick="deshabilita8()"><label for="radio-one8">A</label>
                                        <input type="radio" name="options8" value="2" id="radio-dos8" onclick="deshabilita8()" checked><label for="radio-dos8">E</label>
                                        <input type="radio" name="options8" value="0" id="radio-tres8" onclick="habilita8()"><label for="radio-tres8">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion8',null,['disabled' => 'disabled','class'=>'inputText8 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha8',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha8',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha8',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha8',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton9',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb9' class="default"></div>
                              @endif
                          </td>
                          <td>2.8</td>
                          <td>Acta de Aceptación de Comunidad o Beneficiarios</td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('path_file_pdf')?>
                          <?php $pdf9 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf9 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup9_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('aceptado');
                                   ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options9" value="1" id="radio-one9" checked disabled><label for="radio-one9">A</label>
                                        <input type="radio" name="options9" value="2" id="radio-dos9" disabled><label for="radio-dos9">E</label>
                                        <input type="radio" name="options9" value="0" id="radio-tres9" disabled><label for="radio-tres9">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options9" value="1" id="radio-one9" onclick="deshabilita9()"><label for="radio-one9">A</label>
                                        <input type="radio" name="options9" value="2" id="radio-dos9" onclick="deshabilita9()" ><label for="radio-dos9">E</label>
                                        <input type="radio" name="options9" value="0" id="radio-tres9" checked onclick="habilita9()"><label for="radio-tres9">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options9" value="1" id="radio-one9" onclick="deshabilita9()"><label for="radio-one9">A</label>
                                        <input type="radio" name="options9" value="2" id="radio-dos9" onclick="deshabilita9()" checked><label for="radio-dos9">E</label>
                                        <input type="radio" name="options9" value="0" id="radio-tres9" onclick="habilita9()"><label for="radio-tres9">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion9',null,['disabled' => 'disabled','class'=>'inputText9 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha9',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha9',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha9',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha9',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton10',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb10' class="default"></div>
                              @endif
                          </td>
                          <td>2.9</td>
                          <td>Acta Constitutiva de Comité
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('path_file_pdf')?>
                          <?php $pdf10 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf10 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup10_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('aceptado');
                                   ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options10" value="1" id="radio-one10" checked disabled><label for="radio-one10">A</label>
                                        <input type="radio" name="options10" value="2" id="radio-dos10" disabled><label for="radio-dos10">E</label>
                                        <input type="radio" name="options10" value="0" id="radio-tres10" disabled><label for="radio-tres10">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options10" value="1" id="radio-one10" onclick="deshabilita10()"><label for="radio-one10">A</label>
                                        <input type="radio" name="options10" value="2" id="radio-dos10" onclick="deshabilita10()" ><label for="radio-dos10">E</label>
                                        <input type="radio" name="options10" value="0" id="radio-tres10" checked onclick="habilita10()"><label for="radio-tres10">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options10" value="1" id="radio-one10" onclick="deshabilita10()"><label for="radio-one10">A</label>
                                        <input type="radio" name="options10" value="2" id="radio-dos10" onclick="deshabilita10()" checked><label for="radio-dos10">E</label>
                                        <input type="radio" name="options10" value="0" id="radio-tres10" onclick="habilita10()"><label for="radio-tres10">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion10',null,['disabled' => 'disabled','class'=>'inputText10 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha10',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha10',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha10',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha10',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton11',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb11' class="default"></div>
                              @endif
                          </td>
                          <td>2.10</td>
                          <td>Registro de Asistencia de Comité</td>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('path_file_pdf')?>
                          <?php $pdf11 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf11 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup11_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options11" value="1" id="radio-one11" checked disabled><label for="radio-one11">A</label>
                                        <input type="radio" name="options11" value="2" id="radio-dos11" disabled><label for="radio-dos11">E</label>
                                        <input type="radio" name="options11" value="0" id="radio-tres11" disabled><label for="radio-tres11">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options11" value="1" id="radio-one11" onclick="deshabilita11()"><label for="radio-one11">A</label>
                                        <input type="radio" name="options11" value="2" id="radio-dos11" onclick="deshabilita11()" ><label for="radio-dos11">E</label>
                                        <input type="radio" name="options11" value="0" id="radio-tres11" checked onclick="habilita11()"><label for="radio-tres11">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options11" value="1" id="radio-one11" onclick="deshabilita11()"><label for="radio-one11">A</label>
                                        <input type="radio" name="options11" value="2" id="radio-dos11" onclick="deshabilita11()" checked><label for="radio-dos11">E</label>
                                        <input type="radio" name="options11" value="0" id="radio-tres11" onclick="habilita11()"><label for="radio-tres11">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion11',null,['disabled' => 'disabled','class'=>'inputText11 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha11',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha11',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha11',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha11',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton12',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb12' class="default"></div>
                              @endif
                          </td>
                          <th>3</th>
                          <th>Acta de Aceptación de la Obra</th>
                         <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('path_file_pdf')?>
                         <?php $pdf12 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf12 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup12_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options12" value="1" id="radio-one12" checked disabled><label for="radio-one12">A</label>
                                        <input type="radio" name="options12" value="2" id="radio-dos12" disabled><label for="radio-dos12">E</label>
                                        <input type="radio" name="options12" value="0" id="radio-tres12" disabled><label for="radio-tres12">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options12" value="1" id="radio-one12" onclick="deshabilita12()"><label for="radio-one12">A</label>
                                        <input type="radio" name="options12" value="2" id="radio-dos12" onclick="deshabilita12()" ><label for="radio-dos12">E</label>
                                        <input type="radio" name="options12" value="0" id="radio-tres12" checked onclick="habilita12()"><label for="radio-tres12">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options12" value="1" id="radio-one12" onclick="deshabilita12()"><label for="radio-one12">A</label>
                                        <input type="radio" name="options12" value="2" id="radio-dos12" onclick="deshabilita12()" checked><label for="radio-dos12">E</label>
                                        <input type="radio" name="options12" value="0" id="radio-tres12" onclick="habilita12()"><label for="radio-tres12">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion12',null,['disabled' => 'disabled','class'=>'inputText12 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha12',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha12',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                  <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha12',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha12',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton13',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb13' class="default"></div>
                              @endif
                          </td>
                          <th>4</th>
                          <th>Proyecto Ejecutivo</th>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('path_file_pdf')?>
                          <?php $pdf13 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf13 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup13_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options13" value="1" id="radio-one13" checked disabled><label for="radio-one13">A</label>
                                        <input type="radio" name="options13" value="2" id="radio-dos13" disabled><label for="radio-dos13">E</label>
                                        <input type="radio" name="options13" value="0" id="radio-tres13" disabled><label for="radio-tres13">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options13" value="1" id="radio-one13" onclick="deshabilita13()"><label for="radio-one13">A</label>
                                        <input type="radio" name="options13" value="2" id="radio-dos13" onclick="deshabilita13()" ><label for="radio-dos13">E</label>
                                        <input type="radio" name="options13" value="0" id="radio-tres13" checked onclick="habilita13()"><label for="radio-tres13">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options13" value="1" id="radio-one13" onclick="deshabilita13()"><label for="radio-one13">A</label>
                                        <input type="radio" name="options13" value="2" id="radio-dos13" onclick="deshabilita13()" checked><label for="radio-dos13">E</label>
                                        <input type="radio" name="options13" value="0" id="radio-tres13" onclick="habilita13()"><label for="radio-tres13">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion13',null,['disabled' => 'disabled','class'=>'inputText13 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha13',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha13',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha13',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha13',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton14',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb14' class="default"></div>
                              @endif
                          </td>
                          <th>5</th>
                          <th>Presupuesto Base</th>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('path_file_pdf')?>
                          <?php $pdf14 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf14 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup14_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options14" value="1" id="radio-one14" checked disabled><label for="radio-one14">A</label>
                                        <input type="radio" name="options14" value="2" id="radio-dos14" disabled><label for="radio-dos14">E</label>
                                        <input type="radio" name="options14" value="0" id="radio-tres14" disabled><label for="radio-tres14">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options14" value="1" id="radio-one14" onclick="deshabilita14()"><label for="radio-one14">A</label>
                                        <input type="radio" name="options14" value="2" id="radio-dos14" onclick="deshabilita14()" ><label for="radio-dos14">E</label>
                                        <input type="radio" name="options14" value="0" id="radio-tres14" checked onclick="habilita14()"><label for="radio-tres14">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options14" value="1" id="radio-one14" onclick="deshabilita14()"><label for="radio-one14">A</label>
                                        <input type="radio" name="options14" value="2" id="radio-dos14" onclick="deshabilita14()" checked><label for="radio-dos14">E</label>
                                        <input type="radio" name="options14" value="0" id="radio-tres14" onclick="habilita14()"><label for="radio-tres14">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion14',null,['disabled' => 'disabled','class'=>'inputText14 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha14',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha14',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                  $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha14',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha14',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton15',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb15' class="default"></div>
                              @endif
                          </td>
                          <th>6</th>
                          <th>Estudios de Mecánica de Suelos</th>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('path_file_pdf')?>
                          <?php $pdf15 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf15 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup15_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options15" value="1" id="radio-one15" checked disabled><label for="radio-one15">A</label>
                                        <input type="radio" name="options15" value="2" id="radio-dos15" disabled><label for="radio-dos15">E</label>
                                        <input type="radio" name="options15" value="0" id="radio-tres15" disabled><label for="radio-tres15">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options15" value="1" id="radio-one15" onclick="deshabilita15()"><label for="radio-one15">A</label>
                                        <input type="radio" name="options15" value="2" id="radio-dos15" onclick="deshabilita15()" ><label for="radio-dos15">E</label>
                                        <input type="radio" name="options15" value="0" id="radio-tres15" checked onclick="habilita15()"><label for="radio-tres15">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options15" value="1" id="radio-one15" onclick="deshabilita15()"><label for="radio-one15">A</label>
                                        <input type="radio" name="options15" value="2" id="radio-dos15" onclick="deshabilita15()" checked><label for="radio-dos15">E</label>
                                        <input type="radio" name="options15" value="0" id="radio-tres15" onclick="habilita15()"><label for="radio-tres15">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion15',null,['disabled' => 'disabled','class'=>'inputText15 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha15',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha15',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha15',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha15',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton16',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb16' class="default"></div>
                              @endif
                          </td>
                          <th>7</th>
                          <th>Impacto Ambiental</th>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('path_file_pdf')?>
                          <?php $pdf16 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf16 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup16_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options16" value="1" id="radio-one16" checked disabled><label for="radio-one16">A</label>
                                        <input type="radio" name="options16" value="2" id="radio-dos16" disabled><label for="radio-dos16">E</label>
                                        <input type="radio" name="options16" value="0" id="radio-tres16" disabled><label for="radio-tres16">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options16" value="1" id="radio-one16" onclick="deshabilita16()"><label for="radio-one16">A</label>
                                        <input type="radio" name="options16" value="2" id="radio-dos16" onclick="deshabilita16()" ><label for="radio-dos16">E</label>
                                        <input type="radio" name="options16" value="0" id="radio-tres16" checked onclick="habilita16()"><label for="radio-tres16">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options16" value="1" id="radio-one16" onclick="deshabilita16()"><label for="radio-one16">A</label>
                                        <input type="radio" name="options16" value="2" id="radio-dos16" onclick="deshabilita16()" checked><label for="radio-dos16">E</label>
                                        <input type="radio" name="options16" value="0" id="radio-tres16" onclick="habilita16()"><label for="radio-tres16">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion16',null,['disabled' => 'disabled','class'=>'inputText16 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha16',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha16',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha16',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha16',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton17',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb17' class="default"></div>
                              @endif
                          </td>
                          <th>8</th>
                          <th>Uso de Suelo</th>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('path_file_pdf')?>
                          <?php $pdf17 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf17 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup17_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options17" value="1" id="radio-one17" checked disabled><label for="radio-one17">A</label>
                                        <input type="radio" name="options17" value="2" id="radio-dos17" disabled><label for="radio-dos17">E</label>
                                        <input type="radio" name="options17" value="0" id="radio-tres17" disabled><label for="radio-tres17">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options17" value="1" id="radio-one17" onclick="deshabilita17()"><label for="radio-one17">A</label>
                                        <input type="radio" name="options17" value="2" id="radio-dos17" onclick="deshabilita17()" ><label for="radio-dos17">E</label>
                                        <input type="radio" name="options17" value="0" id="radio-tres17" checked onclick="habilita17()"><label for="radio-tres17">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options17" value="1" id="radio-one17" onclick="deshabilita17()"><label for="radio-one17">A</label>
                                        <input type="radio" name="options17" value="2" id="radio-dos17" onclick="deshabilita17()" checked><label for="radio-dos17">E</label>
                                        <input type="radio" name="options17" value="0" id="radio-tres17" onclick="habilita17()"><label for="radio-tres17">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion17',null,['disabled' => 'disabled','class'=>'inputText17 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha17',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha17',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                  <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha17',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha17',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton18',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb18' class="default"></div>
                              @endif
                          </td>
                          <th>9</th>
                          <th>Permisos y Licencia</th>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('path_file_pdf')?>
                          <?php $pdf18 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf18 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup18_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options18" value="1" id="radio-one18" checked disabled><label for="radio-one18">A</label>
                                        <input type="radio" name="options18" value="2" id="radio-dos18" disabled><label for="radio-dos18">E</label>
                                        <input type="radio" name="options18" value="0" id="radio-tres18" disabled><label for="radio-tres18">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options18" value="1" id="radio-one18" onclick="deshabilita18()"><label for="radio-one18">A</label>
                                        <input type="radio" name="options18" value="2" id="radio-dos18" onclick="deshabilita18()" ><label for="radio-dos18">E</label>
                                        <input type="radio" name="options18" value="0" id="radio-tres18" checked onclick="habilita18()"><label for="radio-tres18">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options18" value="1" id="radio-one18" onclick="deshabilita18()"><label for="radio-one18">A</label>
                                        <input type="radio" name="options18" value="2" id="radio-dos18" onclick="deshabilita18()" checked><label for="radio-dos18">E</label>
                                        <input type="radio" name="options18" value="0" id="radio-tres18" onclick="habilita18()"><label for="radio-tres18">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion18',null,['disabled' => 'disabled','class'=>'inputText18 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha18',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha18',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                  <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha18',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha18',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton19',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb19' class="default"></div>
                              @endif
                          </td>
                          <th>10</th>
                          <th>Tenencia de la Tierra</th>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('path_file_pdf')?>
                          <?php $pdf19 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf19 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup19_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('aceptado');
                                  ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options19" value="1" id="radio-one19" checked disabled><label for="radio-one19">A</label>
                                        <input type="radio" name="options19" value="2" id="radio-dos19" disabled><label for="radio-dos19">E</label>
                                        <input type="radio" name="options19" value="0" id="radio-tres19" disabled><label for="radio-tres19">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options19" value="1" id="radio-one19" onclick="deshabilita19()"><label for="radio-one19">A</label>
                                        <input type="radio" name="options19" value="2" id="radio-dos19" onclick="deshabilita19()" ><label for="radio-dos19">E</label>
                                        <input type="radio" name="options19" value="0" id="radio-tres19" checked onclick="habilita19()"><label for="radio-tres19">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options19" value="1" id="radio-one19" onclick="deshabilita19()"><label for="radio-one19">A</label>
                                        <input type="radio" name="options19" value="2" id="radio-dos19" onclick="deshabilita19()" checked><label for="radio-dos19">E</label>
                                        <input type="radio" name="options19" value="0" id="radio-tres19" onclick="habilita19()"><label for="radio-tres19">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion19',null,['disabled' => 'disabled','class'=>'inputText19 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha19',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha19',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                   <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha19',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha19',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>

                      <tr class="active ">
                          {!! Form::open(['route'=>['boton20',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                          @php
                          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('permiso_check')
                          @endphp
                          <td>
                              @if(count($che)!=0)
                                  @if($che[0]=='1')
                                      <div class="text-center"><input type="checkbox" class="default" checked disabled></div>
                                  @endif
                              @else
                                  <div class="text-center"><input type="checkbox" name='checkb20' class="default"></div>
                              @endif
                          </td>
                          <th>11</th>
                          <th>Convenio de Colaboración</th>
                          <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('path_file_pdf')?>
                          <?php $pdf20 = ''?>
                          @if(strlen($list_pdf)>6)
                              <?php $list_pdf= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('path_file_pdf')?>
                              @for($i=0; $i<=count($list_pdf); $i++)
                                  @if($i == count($list_pdf))
                                      <?php $pdf20 = $list_pdf[$i-1]?>
                                  @endif
                              @endfor
                              <td>
                                  <a href="#popup20_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                              </td>
                              <td>
                                  <?php $estado= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('aceptado');
                                   ?>
                                  <span class="customRadio">
                                    @if($estado[0]=='1')
                                        <input type="radio" name="options20" value="1" id="radio-one20" checked disabled><label for="radio-one20">A</label>
                                        <input type="radio" name="options20" value="2" id="radio-dos20" disabled><label for="radio-dos20">E</label>
                                        <input type="radio" name="options20" value="0" id="radio-tres20" disabled><label for="radio-tres20">NA</label>
                                    @endif
                                    @if($estado[0]=='0')
                                        <input type="radio" name="options20" value="1" id="radio-one20" onclick="deshabilita20()"><label for="radio-one20">A</label>
                                        <input type="radio" name="options20" value="2" id="radio-dos20" onclick="deshabilita20()" ><label for="radio-dos20">E</label>
                                        <input type="radio" name="options20" value="0" id="radio-tres20" checked onclick="habilita20()"><label for="radio-tres20">NA</label>
                                    @endif
                                    @if($estado[0]=='2')
                                        <input type="radio" name="options20" value="1" id="radio-one20" onclick="deshabilita20()"><label for="radio-one20">A</label>
                                        <input type="radio" name="options20" value="2" id="radio-dos20" onclick="deshabilita20()" checked><label for="radio-dos20">E</label>
                                        <input type="radio" name="options20" value="0" id="radio-tres20" onclick="habilita20()"><label for="radio-tres20">NA</label>
                                    @endif
                                  </span>
                              </td>
                              <td>
                                  <?php $nota= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('nota');
                                  ?>
                                  {!! Form::textarea('descripcion20',null,['disabled' => 'disabled','class'=>'inputText20 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                              </td>
                              <td>
                                  <?php $fecha= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('fecha_lim');
                                      $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                   ?>
                                  @if($estado[0]=='1')
                                      {!!Form::date('fecha20',$fecha[0],['disabled' => 'disabled','class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @else
                                      {!!Form::date('fecha20',$fecha[0],['class'=>'form-contol text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                              <?php $estad='0'?>
                          @else
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                  <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                      $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                      $fechad= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('fecha_lim');
                                  ?>
                                  @if(count($fechad)==0)
                                      {!! Form::date('fecha20',null,['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                  @else
                                      {!!Form::date('fecha20',$fechad[0],['class'=>'form-contol text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                  @endif
                              </td>
                          <?php $estad='1'?>
                          @endif
                          @if(count($estado)!=0)
                              @if(($estado[0]!='1'))
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @else
                                  @if($estad=='1')
                                      <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @else
                                      <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                      {!! Form::close() !!}
                                  @endif
                              @endif
                          @else
                              @if($estad=='1')
                                  <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                                  <?php $estad='0'?>
                              @else
                                  <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                  {!! Form::close() !!}
                              @endif
                          @endif
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <div class="modal-wrapper" id="popup_f1">
      <div class="popup_f1-contenedor">
          <h2>Oficio de Aprobación con Anexos Técnicos</h2>
          <iframe  class="popup_f1-body" id="pdfdoc" src="{{asset($pdf1)}}"  width="100%" height="500px"></iframe>
          <a class="popup_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup2_f1">
      <div class="popup2_f1-contenedor">
          <h2>Cédula de Información Básica</h2>
          <iframe  class="popup2_f1-body" id="pdfdoc" src="{{asset($pdf2)}}"  width="100%" height="500px"></iframe>
          <a class="popup2_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup3_f1">
      <div class="popup3_f1-contenedor">
          <h2>Catálogo de Conceptos Preliminares</h2>
          <iframe  class="popup3_f1-body" id="pdfdoc" src="{{asset($pdf3)}}"  width="100%" height="500px"></iframe>
          <a class="popup3_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup4_f1">
      <div class="popup4_f1-contenedor">
          <h2>Calendarización Preliminar</h2>
          <iframe  class="popup4_f1-body" id="pdfdoc" src="{{asset($pdf4)}}"  width="100%" height="500px"></iframe>
          <a class="popup4_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup5_f1">
      <div class="popup5_f1-contenedor">
          <h2>Validación y Dictamen de Factibilidad</h2>
          <iframe  class="popup5_f1-body" id="pdfdoc" src="{{asset($pdf5)}}"  width="100%" height="500px"></iframe>
          <a class="popup5_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup6_f1">
      <div class="popup6_f1-contenedor">
          <h2>Croquis de Localización de la Obra</h2>
          <iframe  class="popup6_f1-body" id="pdfdoc" src="{{asset($pdf6)}}"  width="100%" height="500px"></iframe>
          <a class="popup6_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup7_f1">
      <div class="popup7_f1-contenedor">
          <h2>Proyecto de la Obra</h2>
          <iframe  class="popup7_f1-body" id="pdfdoc" src="{{asset($pdf7)}}"  width="100%" height="500px"></iframe>
          <a class="popup7_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup8_f1">
      <div class="popup8_f1-contenedor">
          <h2>Permiso de la Obra </h2>
          <iframe  class="popup8_f1-body" id="pdfdoc" src="{{asset($pdf8)}}"  width="100%" height="500px"></iframe>
          <a class="popup8_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup9_f1">
      <div class="popup9_f1-contenedor">
          <h2>Acta de Aceptación de Comunidad o Beneficiarios</h2>
          <iframe  class="popup9_f1-body" id="pdfdoc" src="{{asset($pdf9)}}"  width="100%" height="500px"></iframe>
          <a class="popup9_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup10_f1">
      <div class="popup10_f1-contenedor">
          <h2>Acta Constitutiva de Comité</h2>
          <iframe  class="popup10_f1-body" id="pdfdoc" src="{{asset($pdf10)}}"  width="100%" height="500px"></iframe>
          <a class="popup10_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup11_f1">
      <div class="popup11_f1-contenedor">
          <h2>Registro de Asistencia de Comité</h2>
          <iframe  class="popup11_f1-body" id="pdfdoc" src="{{asset($pdf11)}}"  width="100%" height="500px"></iframe>
          <a class="popup11_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup12_f1">
      <div class="popup12_f1-contenedor">
          <h2>Acta de Aceptación de la Obra</h2>
          <iframe  class="popup12_f1-body" id="pdfdoc" src="{{asset($pdf12)}}"  width="100%" height="500px"></iframe>
          <a class="popup12_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup13_f1">
      <div class="popup13_f1-contenedor">
          <h2>Proyecto Ejecutivo</h2>
          <iframe  class="popup13_f1-body" id="pdfdoc" src="{{asset($pdf13)}}"  width="100%" height="500px"></iframe>
          <a class="popup13_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup14_f1">
      <div class="popup14_f1-contenedor">
          <h2>Presupuesto Base</h2>
          <iframe  class="popup14_f1-body" id="pdfdoc" src="{{asset($pdf14)}}"  width="100%" height="500px"></iframe>
          <a class="popup14_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup15_f1">
      <div class="popup15_f1-contenedor">
          <h2>Estudios de Mecánica de Suelos</h2>
          <iframe  class="popup15_f1-body" id="pdfdoc" src="{{asset($pdf15)}}"  width="100%" height="500px"></iframe>
          <a class="popup15_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup16_f1">
      <div class="popup16_f1-contenedor">
          <h2>Impacto Ambiental</h2>
          <iframe  class="popup16_f1-body" id="pdfdoc" src="{{asset($pdf16)}}"  width="100%" height="500px"></iframe>
          <a class="popup16_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup17_f1">
      <div class="popup17_f1-contenedor">
          <h2>Uso de Suelo</h2>
          <iframe  class="popup17_f1-body" id="pdfdoc" src="{{asset($pdf17)}}"  width="100%" height="500px"></iframe>
          <a class="popup17_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup18_f1">
      <div class="popup18_f1-contenedor">
          <h2>Permisos y Licencia</h2>
          <iframe  class="popup18_f1-body" id="pdfdoc" src="{{asset($pdf18)}}"  width="100%" height="500px"></iframe>
          <a class="popup18_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup19_f1">
      <div class="popup19_f1-contenedor">
          <h2>Tenencia de la tierra</h2>
          <iframe  class="popup19_f1-body" id="pdfdoc" src="{{asset($pdf19)}}"  width="100%" height="500px"></iframe>
          <a class="popup19_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>
  <div class="modal-wrapper" id="popup20_f1">
      <div class="popup20_f1-contenedor">
          <h2>Convenio de Colaboración</h2>
          <iframe  class="popup20_f1-body" id="pdfdoc" src="{{asset($pdf20)}}"  width="100%" height="500px"></iframe>
          <a class="popup20_f1-cerrar" href="{{ route('faseuno.edit',$proyecto) }}">X</a>
      </div>
  </div>

  <script type="/sweetalert/dist/sweetalert2.min.js">

  </script>
  @include('sweetalert::alert')
@endsection
