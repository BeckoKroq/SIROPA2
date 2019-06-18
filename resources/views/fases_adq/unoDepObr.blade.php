@extends('layout.admin')
@section('content')
    <meta charset="UTF-8">
    {!! csrf_field() !!}

    <div class="container background-white">
        <div class="row">
            <div class="col-md-12 background-white">
                <div class="alert alert-info text-center font-weight">
                  <?php use Illuminate\Support\Facades\DB; ?>
                  <h2><?php $Nom= DB::table('adquisicions')->where('id', $adquisicion)->pluck('nombre_adquisicion');
                        echo $Nom[0];
                  ?> </h2>
                </div>
                {!!link_to_route('adquisicion.show', $title='Regresar a adquisición', $parameters = $adquisicion, $attributes=['class'=>'btn btn-success sm'])!!}
                <br></br>
                <div class="alert alert-info text-center font-weight " >
                    Etapa Planeación y Programación
                </div>
                @php
                    $now = new \DateTime();
                @endphp
                <table class="table">
                    <thead>
                        <tr class="success">
                            <th></th>
                            <th>Documento</th>
                            <th>Archivo</th>
                            <th>Ver</th>
                            <th>Estado del Archivo</th>
                            <th>Nota</th>
                            <th>Fecha Límite</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $existe_1= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('id') ?>
                        <?php $pdf1 = ''?>
                        @if(count($existe_1) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton1',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>1</td>
                                <td>Oficio de Aprobación con anexos Técnicos</td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo1">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo1">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf1 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options1" id="option1" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options1" id="option1" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options1" id="option1" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo1">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',1)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

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

                        <?php $existe_2= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('id') ?>
                        <?php $pdf2 = ''?>
                        @if(count($existe_2) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.1</td>
                                <td>Cédula de Información Básica</td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo2">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo2">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf2 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup2_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options2" id="option2" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options2" id="option2" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options2" id="option2" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo2">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>
                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',2)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_3= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('id') ?>
                        <?php $pdf3 = ''?>
                        @if(count($existe_3) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton3',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.2</td>
                                <td>Catálogo de Conceptos Preliminares</td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo3">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo3">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf3 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup3_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options3" id="option3" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options3" id="option3" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options3" id="option3" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo3">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',3)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_4= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('id') ?>
                        <?php $pdf4 = ''?>
                        @if(count($existe_4) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton4',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.3</td>
                                <td>Calendarización Preliminar</td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo4">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo4">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf4 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup4_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options4" id="option4" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options4" id="option4" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options4" id="option4" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo4">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',4)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_5= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('id') ?>
                        <?php $pdf5 = ''?>
                        @if(count($existe_5) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton5',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.4</td>
                                <td>Validación y Dictamen de Factibilidad</td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo5">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo5">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf5 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup5_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options5" id="option5" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options5" id="option5" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options5" id="option5" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo5">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',5)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_6= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('id') ?>
                        <?php $pdf6 = ''?>
                        @if(count($existe_6) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton6',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.5</td>
                                <td>Croquis de Localización de la Obra</td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo6">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo6">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf6 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup6_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options6" id="option6" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options6" id="option6" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options6" id="option6" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo6">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',6)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_7= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('id') ?>
                        <?php $pdf7 = ''?>
                        @if(count($existe_7) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton7',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.6</td>
                                <td>adquisicion de la Obra</td>                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo7">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo7">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf7 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup7_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options7" id="option7" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options7" id="option7" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options7" id="option7" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo7">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 1, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',7)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_8= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('id') ?>
                        <?php $pdf8 = ''?>
                        @if(count($existe_8) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton8',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.7</td>
                                <td>Permiso de la Obra </td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo8">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo8">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf8 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup8_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options8" id="option8" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options8" id="option8" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options8" id="option8" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo8">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',8)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_9= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('id') ?>
                        <?php $pdf9 = ''?>
                        @if(count($existe_9) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton9',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.8</td>
                                <td>Acta de Aceptación de Comunidad o Beneficiarios</td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo9">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo9">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf9 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup9_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options9" id="option9" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options9" id="option9" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options9" id="option9" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo9">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',9)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_10= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('id') ?>
                        <?php $pdf10 = ''?>
                        @if(count($existe_10) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton10',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.9</td>
                                <td>Acta Constitutiva de Comité</td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo10">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo10">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf10 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup10_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options10" id="option10" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options10" id="option10" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options10" id="option10" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo10">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',10)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_11= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('id') ?>
                        <?php $pdf11 = ''?>
                        @if(count($existe_11) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton11',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2.10</td>
                                <td>Registro de Asistencia de Comité</td>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo11">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo11">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf11 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup11_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options11" id="option11" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options11" id="option11" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options11" id="option11" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo11">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',11)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_12= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',12)->pluck('id') ?>
                        <?php $pdf12 = ''?>
                        @if(count($existe_12) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton12',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <th>3</th>
                                <th>Acta de Aceptación de la Obra</th>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',12)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',12)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',12)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo12">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo12">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf12 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup12_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',12)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options12" id="option12" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options12" id="option12" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options12" id="option12" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo12">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',12)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',12)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',12)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_13= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',13)->pluck('id') ?>
                        <?php $pdf13 = ''?>
                        @if(count($existe_13) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton13',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <th>4</th>
                                <th>adquisicion Ejecutivo</th>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',13)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',13)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',13)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo13">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo13">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf13 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup13_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',13)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options13" id="option13" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options13" id="option13" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options13" id="option13" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo13">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',13)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',13)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',13)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_14= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',14)->pluck('id') ?>
                        <?php $pdf14 = ''?>
                        @if(count($existe_14) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton14',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <th>5</th>
                                <th>Presupuesto Base</th>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',14)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',14)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',14)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo14">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo14">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf14 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup14_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',14)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options14" id="option14" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options14" id="option14" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options14" id="option14" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo14">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',14)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',14)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',14)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_15= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',15)->pluck('id') ?>
                        <?php $pdf15 = ''?>
                        @if(count($existe_15) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton15',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <th>6</th>
                                <th>Estudios de Mecánica de Suelos</th>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',15)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',15)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',15)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo15">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo15">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf15 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup15_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',15)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options15" id="option15" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options15" id="option15" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options15" id="option15" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo15">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',15)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',15)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',15)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_16= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',16)->pluck('id') ?>
                        <?php $pdf16 = ''?>
                        @if(count($existe_16) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton16',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <th>7</th>
                                <th>Impacto Ambiental</th>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',16)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',16)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',16)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo16">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo16">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf16 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup16_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',16)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options16" id="option16" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options16" id="option16" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options16" id="option16" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo16">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',16)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',16)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',16)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_17= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',17)->pluck('id') ?>
                        <?php $pdf17 = ''?>
                        @if(count($existe_17) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton17',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <th>8</th>
                                <th>Uso de Suelo</th>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',17)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',17)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',17)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo17">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo17">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf17 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup17_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',17)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options17" id="option17" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options17" id="option17" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options17" id="option17" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo17">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',17)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',17)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',17)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_18= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',18)->pluck('id') ?>
                        <?php $pdf18 = ''?>
                        @if(count($existe_18) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton18',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <th>9</th>
                                <th>Permisos y Licencia</th>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',18)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',18)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',18)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo18">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo18">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf18 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup18_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',18)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options18" id="option18" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options18" id="option18" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options18" id="option18" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo18">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',18)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',18)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',18)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_19= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',19)->pluck('id') ?>
                        <?php $pdf19 = ''?>
                        @if(count($existe_19) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton19',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <th>10</th>
                                <th>Tenencia de la Tierra</th>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',19)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',19)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',19)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo19">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo19">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf19 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup19_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',19)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options19" id="option19" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options19" id="option19" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options19" id="option19" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo19">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',19)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',19)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',19)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                        @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                        <?php $existe_20= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',20)->pluck('id') ?>
                        <?php $pdf20 = ''?>
                        @if(count($existe_20) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['_boton20',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <th>11</th>
                                <th>Convenio de Colaboración</th>
                                <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',20)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',20)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',20)->pluck('aceptado');
                                        ?>
                                        @if($estado[0]!='0')
                                            <span class="btn btn-success btn-file" disabled="disabled">
                                                Subir archivo <input type="file" name="archivo20">
                                            </span>
                                        @else
                                            <span class="btn btn-success btn-file">
                                                Subir archivo <input type="file" name="archivo20">
                                            </span>
                                        @endif
                                    </td>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf20 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                    <td>
                                        <a href="#popup20_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',20)->pluck('aceptado')?>
                                            @if($acep[0]==1)
                                                <label class="btn btn-success">
                                                    <input type="radio" name="options20" id="option20" autocomplete="off" disabled="disabled" checked>Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==0)
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="options20" id="option20" autocomplete="off" disabled="disabled" >No Aceptado
                                                </label>
                                            @endif
                                            @if($acep[0]==2)
                                                <label class="btn btn-warning">
                                                    <input type="radio" name="options20" id="option20" autocomplete="off" disabled="disabled" >No Revisado
                                                </label>
                                            @endif
                                        </div>
                                    </td>
                                    <?php $estad='0'?>
                                @else
                                    <?php $estad='1'?>
                                    <td>

                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <span class="btn btn-primary btn-file">
                                            Subir archivo <input type="file" name="archivo20">
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>

                                    <?php $nota= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',20)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 25])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',20)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('_fase_uno_adq')->where('adquisicion_id', $adquisicion)->where('numero',20)->pluck('aceptado');
                                ?>
                                @if($estado[0]=='0')
                                    @if($now->format('Y-m-d')<=$fecha[0])
                                        <td>
                                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                        </td>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                        </td>
                                    @endif
                                @else
                                     @if($estad=='1')
                                         @if($now->format('Y-m-d')<=$fecha[0])
                                            <td>
                                                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                            </td>
                                        @else
                                            <td>
                                                {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}
                                            </td>
                                        @endif
                                        <?php $estad='0'?>
                                    @else
                                        <td>
                                            {!! Form::submit('Guardar',['disabled' => 'disabled','class'=>'btn btn-success']) !!}</td>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-wrapper" id="popup_f1">
        <div class="popup_f1-contenedor">
            <h2>Oficio de Aprobación con Anexos Técnicos</h2>
            <iframe  class="popup_f1-body" id="pdfdoc" src="{{asset($pdf1)}}"  width="100%" height="500px"></iframe>
            <a class="popup_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup2_f1">
        <div class="popup2_f1-contenedor">
            <h2>Cédula de Información Básica</h2>
            <iframe  class="popup2_f1-body" id="pdfdoc" src="{{asset($pdf2)}}"  width="100%" height="500px"></iframe>
            <a class="popup2_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup3_f1">
        <div class="popup3_f1-contenedor">
            <h2>Catálogo de Conceptos Preliminares</h2>
            <iframe  class="popup3_f1-body" id="pdfdoc" src="{{asset($pdf3)}}"  width="100%" height="500px"></iframe>
            <a class="popup3_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup4_f1">
        <div class="popup4_f1-contenedor">
            <h2>Calendarización Preliminar</h2>
            <iframe  class="popup4_f1-body" id="pdfdoc" src="{{asset($pdf4)}}"  width="100%" height="500px"></iframe>
            <a class="popup4_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup5_f1">
        <div class="popup5_f1-contenedor">
            <h2>Validación y Dictamen de Factibilidad</h2>
            <iframe  class="popup5_f1-body" id="pdfdoc" src="{{asset($pdf5)}}"  width="100%" height="500px"></iframe>
            <a class="popup5_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup6_f1">
        <div class="popup6_f1-contenedor">
            <h2>Croquis de Localización de la Obra</h2>
            <iframe  class="popup6_f1-body" id="pdfdoc" src="{{asset($pdf6)}}"  width="100%" height="500px"></iframe>
            <a class="popup6_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup7_f1">
        <div class="popup7_f1-contenedor">
            <h2>adquisicion de la Obra</h2>
            <iframe  class="popup7_f1-body" id="pdfdoc" src="{{asset($pdf7)}}"  width="100%" height="500px"></iframe>
            <a class="popup7_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup8_f1">
        <div class="popup8_f1-contenedor">
            <h2>Permiso de la Obra </h2>
            <iframe  class="popup8_f1-body" id="pdfdoc" src="{{asset($pdf8)}}"  width="100%" height="500px"></iframe>
            <a class="popup8_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup9_f1">
        <div class="popup9_f1-contenedor">
            <h2>Acta de Aceptación de Comunidad o Beneficiarios</h2>
            <iframe  class="popup9_f1-body" id="pdfdoc" src="{{asset($pdf9)}}"  width="100%" height="500px"></iframe>
            <a class="popup9_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup10_f1">
        <div class="popup10_f1-contenedor">
            <h2>Acta Constitutiva de Comité</h2>
            <iframe  class="popup10_f1-body" id="pdfdoc" src="{{asset($pdf10)}}"  width="100%" height="500px"></iframe>
            <a class="popup10_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup11_f1">
        <div class="popup11_f1-contenedor">
            <h2>Registro de Asistencia de Comité</h2>
            <iframe  class="popup11_f1-body" id="pdfdoc" src="{{asset($pdf11)}}"  width="100%" height="500px"></iframe>
            <a class="popup11_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup12_f1">
        <div class="popup12_f1-contenedor">
            <h2>Acta de Aceptación de la Obra</h2>
            <iframe  class="popup12_f1-body" id="pdfdoc" src="{{asset($pdf12)}}"  width="100%" height="500px"></iframe>
            <a class="popup12_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup13_f1">
        <div class="popup13_f1-contenedor">
            <h2>adquisicion Ejecutivo</h2>
            <iframe  class="popup13_f1-body" id="pdfdoc" src="{{asset($pdf13)}}"  width="100%" height="500px"></iframe>
            <a class="popup13_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup14_f1">
        <div class="popup14_f1-contenedor">
            <h2>Presupuesto Base</h2>
            <iframe  class="popup14_f1-body" id="pdfdoc" src="{{asset($pdf14)}}"  width="100%" height="500px"></iframe>
            <a class="popup14_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup15_f1">
        <div class="popup15_f1-contenedor">
            <h2>Estudios de Mecánica de Suelos</h2>
            <iframe  class="popup15_f1-body" id="pdfdoc" src="{{asset($pdf15)}}"  width="100%" height="500px"></iframe>
            <a class="popup15_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup16_f1">
        <div class="popup16_f1-contenedor">
            <h2>Impacto Ambiental</h2>
            <iframe  class="popup16_f1-body" id="pdfdoc" src="{{asset($pdf16)}}"  width="100%" height="500px"></iframe>
            <a class="popup16_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup17_f1">
        <div class="popup17_f1-contenedor">
            <h2>Uso de Suelo</h2>
            <iframe  class="popup17_f1-body" id="pdfdoc" src="{{asset($pdf17)}}"  width="100%" height="500px"></iframe>
            <a class="popup17_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup18_f1">
        <div class="popup18_f1-contenedor">
            <h2>Permisos y Licencia</h2>
            <iframe  class="popup18_f1-body" id="pdfdoc" src="{{asset($pdf18)}}"  width="100%" height="500px"></iframe>
            <a class="popup18_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup19_f1">
        <div class="popup19_f1-contenedor">
            <h2>Tenencia de la tierra</h2>
            <iframe  class="popup19_f1-body" id="pdfdoc" src="{{asset($pdf19)}}"  width="100%" height="500px"></iframe>
            <a class="popup19_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup20_f1">
        <div class="popup20_f1-contenedor">
            <h2>Convenio de Colaboración</h2>
            <iframe  class="popup20_f1-body" id="pdfdoc" src="{{asset($pdf20)}}"  width="100%" height="500px"></iframe>
            <a class="popup20_f1-cerrar" href="{{ route('faseuno_adq.edit',$adquisicion) }}">X</a>
        </div>
    </div>
@endsection
