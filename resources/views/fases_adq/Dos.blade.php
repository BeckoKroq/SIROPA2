@extends('layout.admin')
@section('content')
    <meta charset="UTF-8">
    <div class="container background-white">
        <div class="row">
            <div class="col-md-12 background-white">
                <div class="alert alert-info text-center font-weight " >
                    <?php use Illuminate\Support\Facades\DB; ?>
                    <h1><?php $Nom= DB::table('adquisicions')->where('id', $adquisicion)->pluck('nombre_adquisicion');
                          echo $Nom[0];
                    ?> </h1>
                </div>
                <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
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
              </script>
              {!!link_to_route('adquisicion.show', $title='Regresar a adquisición', $parameters = $adquisicion, $attributes=['class'=>'btn btn-success sm'])!!}
              <br></br>
               {{-- < link rel="stylesheet" type="text/css" href="../../AdminStyle/css/Option.css"> --}}
                <div class="alert alert-info text-center font-weight" >
                    Adjuntación</div>
                <table class="table">
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
                            {!! Form::open(['route'=>['_boton',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                                $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('permiso_check')
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
                            <td>Acuerdo Modalidad de Ejecución</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('path_file_pdf')?>
                            <?php $pdf1 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('path_file_pdf')?>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf1 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                <td>
                                    <a href="#popup_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion1',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha1',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha1',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha1',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='1'?>
                            @endif
                            <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('aceptado');
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
                                    <?php $estad='0'?>
                                @else
                                    <td>{!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-primary']) !!}</td>
                                    {!! Form::close() !!}
                                @endif
                            @endif
                        </tr>

                        <tr class="active ">
                            {!! Form::open(['route'=>['_boton21',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                                $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('permiso_check')
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
                            <td>2</td>
                            <td>Bases de Licitación</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('path_file_pdf')?>
                            <?php $pdf2 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf2 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup2_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>

                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('aceptado');
                                     ?>
                                     <span class="customRadio">
                                       @if($estado[0]=='1')
                                           <input type="radio" name="options2" value="1" id="radio-one2" checked disabled><label for="radio-one2">A</label>
                                           <input type="radio" name="options2" value="2" id="radio-dos2" disabled><label for="radio-dos2">E</label>
                                           <input type="radio" name="options2" value="0" id="radio-tres2" disabled><label for="radio-tres2">NA</label>
                                       @endif
                                       @if($estado[0]=='0')
                                           <input type="radio" name="options2" value="1" id="radio-one2" onclick="deshabilita2()"><label for="radio-one2">A</label>
                                           <input type="radio" name="options2" value="2" id="radio-dos2" onclick="deshabilita2()" ><label for="radio-dos2">E</label>
                                           <input type="radio" name="options2" value="0" id="radio-tres2" checked onclick="habilita2()"><label for="radio-tres2">NA</label>
                                       @endif
                                       @if($estado[0]=='2')
                                           <input type="radio" name="options2" value="1" id="radio-one2" onclick="deshabilita2()"><label for="radio-one2">A</label>
                                           <input type="radio" name="options2" value="2" id="radio-dos2" onclick="deshabilita2()" checked><label for="radio-dos2">E</label>
                                           <input type="radio" name="options2" value="0" id="radio-tres2" onclick="habilita2()"><label for="radio-tres2">NA</label>
                                       @endif
                                     </span>
                                </td>
                                <td>
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion2',null,['disabled' => 'disabled','class'=>'inputText2 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha2',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha2',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td><td>
                                     <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha2',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha2',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['_boton31',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                             @php
                                $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('permiso_check')
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
                            <td>3</td>
                            <td>Convocatoria</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('path_file_pdf')?>
                            <?php $pdf3 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf3 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup3_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion3',null,['disabled' => 'disabled','class'=>'inputText3 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha3',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha3',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha3',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha3',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['_boton41',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('permiso_check')
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
                            <td>4</td>
                            <td>Junta de Aclaraciones</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('path_file_pdf')?>
                            <?php $pdf4 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf4 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup4_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion4',null,['disabled' => 'disabled','class'=>'inputText4 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha4',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha4',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha4',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha4',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['_boton51',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                             @php
                            $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('permiso_check')
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
                            <td>5</td>
                            <td>Oficio de Invitación</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('path_file_pdf')?>
                            <?php $pdf5 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('path_file_pdf')?>

                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf5 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup5_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>

                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion5',null,['disabled' => 'disabled','class'=>'inputText5 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha5',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha5',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                     <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha5',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha5',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['_boton61',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                             @php
                            $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('permiso_check')
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
                            <td>6</td>
                            <td>Acta de Apertura de Propuesta Económica y Técnica</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('path_file_pdf')?>
                            <?php $pdf6 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf6 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup6_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion6',null,['disabled' => 'disabled','class'=>'inputText6 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha6',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha6',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                            <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                     <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha6',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha6',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['_boton71',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                             @php
                            $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('permiso_check')
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
                            <td>7</td>
                            <td>Dictamen y Fallo</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('path_file_pdf')?>
                            <?php $pdf7 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf7 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                               <td>
                                    <a href="#popup7_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion2',null,['disabled' => 'disabled','class'=>'inputText7 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha7',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha7',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                     <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha7',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha7',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['_boton81',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('permiso_check')
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
                            <td>8</td>
                            <td>Contrato</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('path_file_pdf')?>
                            <?php $pdf8 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf8 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup8_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion8',null,['disabled' => 'disabled','class'=>'inputText8 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha8',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha8',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                     <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha8',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha8',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['_boton91',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('permiso_check')
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
                            <td>9</td>
                            <td>Catálogo de Conceptos Contratado</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('path_file_pdf')?>
                            <?php $pdf9 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf9 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>

                                    <a href="#popup9_f1" class="far fa-file-excel fa-2x" style="color:green"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion9',null,['disabled' => 'disabled','class'=>'inputText9 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha9',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha9',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                     <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha9',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha9',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['_boton101',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('permiso_check')
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
                            <td>10</td>
                            <td>Programa de Ejecución de la Obra</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('path_file_pdf')?>
                            <?php $pdf10 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf10 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup10_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion10',null,['disabled' => 'disabled','class'=>'inputText10 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha10',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha10',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                     <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha10',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha10',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['_boton111',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('permiso_check')
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
                            <td>11</td>
                            <td>Convenio de Apelación de Contrato</td>
                            <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('path_file_pdf')?>
                            <?php $pdf11 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf11 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup11_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('aceptado');
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
                                    <?php $nota= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion11',null,['disabled' => 'disabled','class'=>'inputText11 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('fecha_lim');
                                        $fechai= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha11',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha11',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='0'?>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                     <?php $fecha= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_inicio');
                                        $fechaf= DB::table('adquisicions')->where('id', $adquisicion)->pluck('fecha_fin');
                                        $fechad= DB::table('fase_dos_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha11',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha11',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
            <h2>Acuerdo Modalidad de Ejecución</h2>
            <iframe  class="popup_f1-body" id="pdfdoc" src="{{asset($pdf1)}}"  width="100%" height="500px"></iframe>
            <a class="popup_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup2_f1">
        <div class="popup2_f1-contenedor">
            <h2>Bases de Licitación</h2>
            <iframe  class="popup2_f1-body" id="pdfdoc" src="{{asset($pdf2)}}"  width="100%" height="500px"></iframe>
            <a class="popup2_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup3_f1">
        <div class="popup3_f1-contenedor">
            <h2>Convocatoria</h2>
            <iframe  class="popup3_f1-body" id="pdfdoc" src="{{asset($pdf3)}}"  width="100%" height="500px"></iframe>
            <a class="popup3_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup4_f1">
        <div class="popup4_f1-contenedor">
            <h2>Junta de Aclaraciones</h2>
            <iframe  class="popup4_f1-body" id="pdfdoc" src="{{asset($pdf4)}}"  width="100%" height="500px"></iframe>
            <a class="popup4_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup5_f1">
        <div class="popup5_f1-contenedor">
            <h2>Oficio de Invitación</h2>
            <iframe  class="popup5_f1-body" id="pdfdoc" src="{{asset($pdf5)}}"  width="100%" height="500px"></iframe>
            <a class="popup5_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup6_f1">
        <div class="popup6_f1-contenedor">
            <h2>Acta de Apertura de Propuesta Económica y Técnica</h2>
            <iframe  class="popup6_f1-body" id="pdfdoc" src="{{asset($pdf6)}}"  width="100%" height="500px"></iframe>
            <a class="popup6_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup7_f1">
        <div class="popup7_f1-contenedor">
            <h2>Dictamen y Fallo</h2>
            <iframe  class="popup7_f1-body" id="pdfdoc" src="{{asset($pdf7)}}"  width="100%" height="500px"></iframe>
            <a class="popup7_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup8_f1">
        <div class="popup8_f1-contenedor">
            <h2>Contrato</h2>
            <iframe  class="popup8_f1-body" id="pdfdoc" src="{{asset($pdf8)}}"  width="100%" height="500px"></iframe>
            <a class="popup8_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup9_f1">
        <div class="popup9_f1-contenedor">
            <h2>Catálogo de Conceptos Contratado</h2>
            <!--Tabla de coceptos inicio putos-->
                <br>
                <div class="row">
                    <?php
                        $items=\Siropa\conceptos_adq::all();
                        $siHay= DB::table('conceptos_adqs')->where('adquisicion_id', $adquisicion)->pluck('adquisicion_id');
                  ?>
                    @if(count($siHay)!=0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                  <td>Codigo de Conceptos</td>
                                  <td>Conceptos de Trabajo</td>
                                  <td>Unidad de Medida</td>
                                  <td>Cantidad o Volumen</td>
                                  <td>Precio Unitario (pesos)</td>
                                  <td>Importe (pesos)</td>
                                </tr>
                            </thead>
                           @foreach($items as $item)
                               <tr>
                                    @if($item->obras_publicas_id==$adquisicion)
                                      <td>{{$item->clave}}</td>
                                      <td>{{$item->conceptos_de_trabajo}}</td>
                                      <td>{{$item->unidad_de_medida}}</td>
                                      <td>{{$item->cantidad_o_volumen}}</td>
                                      <td>{{$item->precio_unitario}}</td>
                                      <td>{{$item->importe}}</td>
                                    @endif
                               </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
                <!--termina tabla putos-->
                <a class="popup10_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup10_f1">
        <div class="popup10_f1-contenedor">
            <h2>Programa de Ejecución de la Obra</h2>
            <iframe  class="popup10_f1-body" id="pdfdoc" src="{{asset($pdf10)}}"  width="100%" height="500px"></iframe>
            <a class="popup10_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup11_f1">
        <div class="popup11_f1-contenedor">
            <h2></h2>
            <iframe  class="popup11_f1-body" id="pdfdoc" src="{{asset($pdf11)}}"  width="100%" height="500px">Convenio de Apelación de Contrato</iframe>
            <a class="popup11_f1-cerrar" href="{{ route('fase_dos_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
@endsection
