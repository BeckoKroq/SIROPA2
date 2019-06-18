@extends('layout.admin')
@section('content')
    <meta charset="UTF-8">
    <div class="container background-white">
        <div class="row">
            <div class="col-md-12 background-white">
                <div class="alert alert-info text-center font-weight " >
                    <?php use Illuminate\Support\Facades\DB; ?>
                    <h1><?php $Nom= DB::table('proyectos')->where('id', $proyecto)->pluck('nombre_proyecto');
                          echo $Nom[0];
                    ?> </h1>
                </div>
                <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
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
              </script>
              {!!link_to_route('proyecto.show', $title='Regresar a proyecto', $parameters = $proyecto, $attributes=['class'=>'btn btn-success sm'])!!}
              <br></br>
               {{-- < link rel="stylesheet" type="text/css" href="../../AdminStyle/css/Option.css"> --}}
                <div class="alert alert-info text-center font-weight" >
                    Etapa Ejecución</div>
                <table class="table">
                    <thead>
                        <tr class="success">
                            <td>Aplica/No Aplica</td>
                            <th></th>
                            <th>Documento</th>
                            <th></th>
                            <th>Estado del Archivo</th>
                            <th>Nota</th>
                            <th>Fecha Límite</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active ">
                            {!! Form::open(['route'=>['boto20',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            <td></td>
                            <td></td>
                            <td>Evidencia</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}</td>
                            {!! Form::close() !!}
                        </tr>
                        <tr class="active ">
                            {!! Form::open(['route'=>['boto1',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                                $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('permiso_check')
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
                            <td>Auxiliar de Obra Contable</td>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('path_file_pdf')?>
                            <?php $pdf1 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('path_file_pdf')?>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf1 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                <td>
                                    <a href="#popup_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion1',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
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
                                    <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('fecha_lim');
                                        //dd($fecha);
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha1',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha1',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
                                    @endif
                                </td>
                                <?php $estad='1'?>
                            @endif
                            <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('aceptado');
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

                        <tr class="active ">
                            {!! Form::open(['route'=>['boto2',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                                $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('permiso_check')
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
                            <td>Fianza de Cumplimiento</td>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('path_file_pdf')?>
                            <?php $pdf2 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf2 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup2_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>

                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion2',null,['disabled' => 'disabled','class'=>'inputText2 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
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
                                     <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('fecha_lim');
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
                            {!! Form::open(['route'=>['boto3',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                             @php
                                $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('permiso_check')
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
                            <td>Pólizas</td>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('path_file_pdf')?>
                            <?php $pdf3 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf3 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup3_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion3',null,['disabled' => 'disabled','class'=>'inputText3 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
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
                                    <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('fecha_lim');
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
                            {!! Form::open(['route'=>['boto4',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('permiso_check')
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
                            <td>Facturas Listas de Raya Recibos Oficiales</td>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('path_file_pdf')?>
                            <?php $pdf4 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf4 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup4_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion4',null,['disabled' => 'disabled','class'=>'inputText4 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
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
                                    <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('fecha_lim');
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
                            {!! Form::open(['route'=>['boto7',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                             @php
                            $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('permiso_check')
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
                            <td>5</td>
                            <td>Bitácora de la Obra</td>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('path_file_pdf')?>
                            <?php $pdf7 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf7 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                               <td>
                                    <a href="#popup7_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion2',null,['disabled' => 'disabled','class'=>'inputText7 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
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
                                     <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('fecha_lim');
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
                            {!! Form::open(['route'=>['boto9',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('permiso_check')
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
                            <td>6</td>
                            <td>Pruebas de Laboratorio</td>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('path_file_pdf')?>
                            <?php $pdf9 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf9 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup9_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion9',null,['disabled' => 'disabled','class'=>'inputText9 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
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
                                     <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('fecha_lim');
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
                            {!! Form::open(['route'=>['boto10',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('permiso_check')
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
                            <td>7</td>
                            <td>Acta Entrega Recepción</td>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('path_file_pdf')?>
                            <?php $pdf10 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf10 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup10_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion10',null,['disabled' => 'disabled','class'=>'inputText10 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
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
                                     <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('fecha_lim');
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
                            {!! Form::open(['route'=>['boto11',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('permiso_check')
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
                            <td>8</td>
                            <td>Fianza de Vicios Ocultos</td>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('path_file_pdf')?>
                            <?php $pdf11 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf11 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup11_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion11',null,['disabled' => 'disabled','class'=>'inputText11 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
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
                                     <?php $fecha= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('fecha_lim');
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

                        <tr class="active ">
                            {!! Form::open(['route'=>['boto12',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('permiso_check')
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
                            <th>9</th>
                            <th>Finiquito</th>
                           <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('path_file_pdf')?>
                           <?php $pdf12 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf12 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup12_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion12',null,['disabled' => 'disabled','class'=>'inputText12 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha12',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha12',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
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
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha12',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha12',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['boto13',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('permiso_check')
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
                            <th>10</th>
                            <th>Documentos de Resición Administrativa del Contrato</th>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('path_file_pdf')?>
                            <?php $pdf13 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf13 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup13_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion13',null,['disabled' => 'disabled','class'=>'inputText13 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha13',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha13',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
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
                                        $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha13',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha13',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                            {!! Form::open(['route'=>['boto14',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            @php
                            $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('permiso_check')
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
                            <th>11</th>
                            <th>Tarjetas de Precio</th>
                            <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('path_file_pdf')?>
                            <?php $pdf14 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('path_file_pdf')?>
                                @for($i=0; $i<=count($list_pdf); $i++)
                                    @if($i == count($list_pdf))
                                        <?php $pdf14 = $list_pdf[$i-1]?>
                                    @endif
                                @endfor
                                <td>
                                    <a href="#popup14_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>
                                <td>
                                    <?php $estado= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('aceptado');
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
                                    <?php $nota= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('nota');
                                    ?>
                                    {!! Form::textarea('descripcion14',null,['disabled' => 'disabled','class'=>'inputText14 text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('fecha_lim');
                                        $fechai= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_inicio');
                                        $fechaf= DB::table('proyectos')->where('id', $proyecto)->pluck('fecha_fin');
                                     ?>
                                    @if($estado[0]=='1')
                                        {!!Form::date('fecha14',$fecha[0],['disabled' => 'disabled','class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
                                    @else
                                        {!!Form::date('fecha14',$fecha[0],['class'=>'form-control text', 'min'=>$fechai[0], 'max'=>$fechaf[0]]);!!}
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
                                    $fechad= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('fecha_lim');
                                    ?>
                                    @if(count($fechad)==0)
                                        {!! Form::date('fecha14',null,['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0] ]) !!}
                                    @else
                                        {!!Form::date('fecha14',$fechad[0],['class'=>'form-control text', 'min'=>$fecha[0], 'max'=>$fechaf[0]]);!!}
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
                <!--Tabla de coceptos inicio putos-->
                <br>
                <legend>PRESUPUESTO PROGRAMA DE INFRAESTRUCTURA SOCIAL BÁSICA</legend>
                <br>
                <div class="row">
                    <?php $siHay= DB::table('conceptos')->where('obras_publicas_id', $proyecto)->pluck('obras_publicas_id');
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
                                    @if($item->obras_publicas_id==$proyecto)
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
            </div>
        </div>
    </div>
    <div class="modal-wrapper" id="popup_f1">
        <div class="popup_f1-contenedor">
            <h2>Auxiliar de Obra Contable</h2>
            <iframe  class="popup_f1-body" id="pdfdoc" src="{{asset($pdf1)}}"  width="100%" height="500px"></iframe>
            <a class="popup_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup2_f1">
        <div class="popup2_f1-contenedor">
            <h2>Fianza de Cumplimiento</h2>
            <iframe  class="popup2_f1-body" id="pdfdoc" src="{{asset($pdf2)}}"  width="100%" height="500px"></iframe>
            <a class="popup2_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup3_f1">
        <div class="popup3_f1-contenedor">
            <h2>Pólizas</h2>
            <iframe  class="popup3_f1-body" id="pdfdoc" src="{{asset($pdf3)}}"  width="100%" height="500px"></iframe>
            <a class="popup3_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup4_f1">
        <div class="popup4_f1-contenedor">
            <h2>Facturas Listas de Raya Recibos Oficiales</h2>
            <iframe  class="popup4_f1-body" id="pdfdoc" src="{{asset($pdf4)}}"  width="100%" height="500px"></iframe>
            <a class="popup4_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup7_f1">
        <div class="popup7_f1-contenedor">
            <h2>Bitácora de la Obra</h2>
            <iframe  class="popup7_f1-body" id="pdfdoc" src="{{asset($pdf7)}}"  width="100%" height="500px"></iframe>
            <a class="popup7_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup9_f1">
        <div class="popup9_f1-contenedor">
            <h2>Pruebas de Laboratorio</h2>
            <iframe  class="popup9_f1-body" id="pdfdoc" src="{{asset($pdf9)}}"  width="100%" height="500px"></iframe>
            <a class="popup9_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup10_f1">
        <div class="popup10_f1-contenedor">
            <h2>Acta Entrega Recepción</h2>
            <iframe  class="popup10_f1-body" id="pdfdoc" src="{{asset($pdf10)}}"  width="100%" height="500px"></iframe>
            <a class="popup10_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup11_f1">
        <div class="popup11_f1-contenedor">
            <h2>Fianza de Vicios Ocultos</h2>
            <iframe  class="popup11_f1-body" id="pdfdoc" src="{{asset($pdf11)}}"  width="100%" height="500px"></iframe>
            <a class="popup11_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup12_f1">
        <div class="popup12_f1-contenedor">
            <h2>Finiquito</h2>
            <iframe  class="popup12_f1-body" id="pdfdoc" src="{{asset($pdf12)}}"  width="100%" height="500px"></iframe>
            <a class="popup12_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup13_f1">
        <div class="popup13_f1-contenedor">
            <h2>Documentos de Resición Administrativa del Contrato</h2>
            <iframe  class="popup13_f1-body" id="pdfdoc" src="{{asset($pdf13)}}"  width="100%" height="500px"></iframe>
            <a class="popup13_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup14_f1">
        <div class="popup14_f1-contenedor">
            <h2>Tarjetas de Precio</h2>
            <iframe  class="popup14_f1-body" id="pdfdoc" src="{{asset($pdf14)}}"  width="100%" height="500px"></iframe>
            <a class="popup14_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
@endsection
