@extends('layout.admin')
@section('content')
    <meta charset="UTF-8">
    <div class="container background-white">
        <div class="row">
            <?php use Illuminate\Support\Facades\DB; ?>
            <div class="col-md-12 background-white">
                <div class="alert alert-info text-center font-weight">
                    <h2>
                        <?php $Nom= DB::table('proyectos')->where('id', $proyecto)->pluck('nombre_proyecto');
                          echo $Nom[0];
                        ?>
                    </h2>
                </div>
              </script>
              {!!link_to_route('proyecto.show', $title='Regresar a proyecto', $parameters = $proyecto, $attributes=['class'=>'btn btn-success sm'])!!}
              <br></br>
                <div class="alert alert-info text-center font-weight " >
                    Adjuntación
                </div>
                @php
                    $now = new \DateTime();
                @endphp
                <table class="table">
                   <thead>
                        <tr class="success">
                            <th>
                                Descargar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active ">
                            <td>
                                <a href='/Plantilla_de_Conceptos/tabla_de_conceptos.xlsx' download="Tabla de Conceptos">
                                    Plantilla de Tabla de Conceptos
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                        <tr class="success">
                            <th></th>
                            <th>Documento</th>
                            <th>Archivo</th>
                            <th>Ver</th>
                            <th>Aceptado/No Aceptado</th>
                            <th>Nota</th>
                            <th>Fecha Límite</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $existe_1= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('id') ?>
                        <?php $pdf1 = ''?>
                        @if(count($existe_1) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>1</td>
                                <td>Acuerdo Modalidad de Ejecución</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('aceptado');
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

                        <?php $existe_2= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('id') ?>
                        <?php $pdf2 = ''?>
                        @if(count($existe_2) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton21',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>2</td>
                                <td>Bases de Licitación</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('aceptado')?>
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
                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('aceptado');
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

                        <?php $existe_3= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('id') ?>
                        <?php $pdf3 = ''?>
                        @if(count($existe_3) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton31',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>3</td>
                                <td>Convocatoria</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('aceptado');
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

                        <?php $existe_4= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('id') ?>
                        <?php $pdf4 = ''?>
                        @if(count($existe_4) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton41',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>4</td>
                                <td>Junta de Aclaraciones</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('aceptado');
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

                        <?php $existe_5= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('id') ?>
                        <?php $pdf5 = ''?>
                        @if(count($existe_5) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton51',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>5</td>
                                <td>Oficio de Invitación</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('aceptado');
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

                        <?php $existe_6= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('id') ?>
                        <?php $pdf6 = ''?>
                        @if(count($existe_6) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton61',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>6</td>
                                <td>Acta de Apertura de Propuesta Económica y Técnica</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('aceptado');
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

                        <?php $existe_7= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('id') ?>
                        <?php $pdf7 = ''?>
                        @if(count($existe_7) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton71',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>7</td>
                                <td>Dictamen y Fallo</td>                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('aceptado');
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

                        <?php $existe_8= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('id') ?>
                        <?php $pdf8 = ''?>
                        @if(count($existe_8) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton81',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>8</td>
                                <td>Contrato</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('aceptado');
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

                        <?php $existe_9= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('id') ?>
                        <?php $pdf9 = ''?>
                        @if(count($existe_9) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton91',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>9</td>
                                <td>Catálogo de Conceptos Contratado</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('aceptado');
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
                                        <a href="#popup9_f1" class="far fa-file-excel fa-2x" style="color:green"></a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('aceptado');
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

                        <?php $existe_10= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('id') ?>
                        <?php $pdf10 = ''?>
                        @if(count($existe_10) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton101',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>10</td>
                                <td>Programa de Ejecución de la Obra</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('aceptado');
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

                        <?php $existe_11= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('id') ?>
                        <?php $pdf11 = ''?>
                        @if(count($existe_11) != 0)
                            <tr class="active ">
                                {!! Form::open(['route'=>['boton111',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td>11</td>
                                <td>Convenio de Apelación de Contrato</td>
                                <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('path_file_pdf')?>
                                @if(strlen($list_pdf)>6)
                                    <?php $list_pdf= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('path_file_pdf')?>
                                    <td>
                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                        <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('aceptado');
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
                                            <?php $acep= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('aceptado')?>
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

                                    <?php $nota= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('nota');?>
                                    {!! Form::textarea('nota',null,['disabled' => 'disabled','class'=>'inputText text', 'placeholder'=>$nota[0],'rows' => 2, 'cols' => 60])!!}
                                </td>
                                <td>
                                    <?php $fecha= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('fecha_lim');
                                    ?>
                                    {!!Form::date('fecha1',$fecha[0],['disabled' => 'disabled','class'=>'inputText text']);!!}
                                </td>
                                <?php $estado= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('aceptado');
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
            <h2>Acuerdo Modalidad de Ejecución</h2>
            <iframe  class="popup_f1-body" id="pdfdoc" src="{{asset($pdf1)}}"  width="100%" height="500px"></iframe>
            <a class="popup_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup2_f1">
        <div class="popup2_f1-contenedor">
            <h2>Bases de Licitación</h2>
            <iframe  class="popup2_f1-body" id="pdfdoc" src="{{asset($pdf2)}}"  width="100%" height="500px"></iframe>
            <a class="popup2_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup3_f1">
        <div class="popup3_f1-contenedor">
            <h2>Convocatoria</h2>
            <iframe  class="popup3_f1-body" id="pdfdoc" src="{{asset($pdf3)}}"  width="100%" height="500px"></iframe>
            <a class="popup3_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup4_f1">
        <div class="popup4_f1-contenedor">
            <h2>Junta de Aclaraciones</h2>
            <iframe  class="popup4_f1-body" id="pdfdoc" src="{{asset($pdf4)}}"  width="100%" height="500px"></iframe>
            <a class="popup4_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup5_f1">
        <div class="popup5_f1-contenedor">
            <h2>Oficio de Invitación</h2>
            <iframe  class="popup5_f1-body" id="pdfdoc" src="{{asset($pdf5)}}"  width="100%" height="500px"></iframe>
            <a class="popup5_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup6_f1">
        <div class="popup6_f1-contenedor">
            <h2>Acta de Apertura de Propuesta Económica y Técnica</h2>
            <iframe  class="popup6_f1-body" id="pdfdoc" src="{{asset($pdf6)}}"  width="100%" height="500px"></iframe>
            <a class="popup6_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup7_f1">
        <div class="popup7_f1-contenedor">
            <h2>Dictamen y Fallo</h2>
            <iframe  class="popup7_f1-body" id="pdfdoc" src="{{asset($pdf7)}}"  width="100%" height="500px"></iframe>
            <a class="popup7_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup8_f1">
        <div class="popup8_f1-contenedor">
            <h2>Contrato</h2>
            <iframe  class="popup8_f1-body" id="pdfdoc" src="{{asset($pdf8)}}"  width="100%" height="500px"></iframe>
            <a class="popup8_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup9_f1">
        <div class="popup9_f1-contenedor">
            <h2>Catálogo de Conceptos Contratado</h2>
            <!--Tabla de coceptos inicio putos-->
                <br>
                <div class="row">
                    <?php 
                        $items=\Siropa\Concepto::all();
                        $siHay= DB::table('conceptos')->where('obras_publicas_id', $proyecto)->pluck('obras_publicas_id');
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
                <a class="popup10_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup10_f1">
        <div class="popup10_f1-contenedor">
            <h2>Programa de Ejecución de la Obra</h2>
            <iframe  class="popup10_f1-body" id="pdfdoc" src="{{asset($pdf10)}}"  width="100%" height="500px"></iframe>
            <a class="popup10_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup11_f1">
        <div class="popup11_f1-contenedor">
            <h2></h2>
            <iframe  class="popup11_f1-body" id="pdfdoc" src="{{asset($pdf11)}}"  width="100%" height="500px">Convenio de Apelación de Contrato</iframe>
            <a class="popup11_f1-cerrar" href="{{ route('fasedos.edit',$proyecto) }}">X</a>
        </div>
    </div>
@endsection
