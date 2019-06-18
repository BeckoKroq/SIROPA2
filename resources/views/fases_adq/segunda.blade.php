@extends('layout.admin')
@section('content')

<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="stilo.css">

    <div class="container background-white">
        <div class="row">
            <div class="col-md-12 background-white">

                <div class="alert alert-info text-center font-weight " >
                    Adjuntacion</div>
                <table class="table">
                    <thead>
                    <tr class="success">
                        <td>Aplica /<br>No Aplica</td>

                        <th></th>
                        <th>Documento</th>
                        <th>Archivo</th>
                        <th></th>
                        <th>Aceptado/No Aceptado</th>
                        <th>Nota</th>
                    </tr>
                    </thead>
                    <?php 
                        use Illuminate\Support\Facades\DB;
                        $ban=0;
                        $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                        for ($i=0; $i < count($vali); $i++) { 
                            if (1==$vali[$i]){
                                $ban=1;
                            }
                        }
                        if ($ban==0){
                    ?>
                            <tr class="active ">
                                <td><div class="text-center"><input type="checkbox" name="check_button" class="default"></div></td>
                                <td>1</td>
                                <td>Acuerdo Modalidad de Ejecución</td>
                                <td>
                                    {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />   
                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo1">
                                    </span></td>
                                <td><a href="#popup" class="popup-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options1" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options1" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion"></textarea></td>
                            </tr>
                     <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>1</p></td>
                                <td><p style="color:#27AE60";>Acuerdo Modalidad de Ejecución</p></td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo1" disabled>
                                    </span>
                                      <input name="archivo1" type="file" style="display: none;"/></td>
                                <td><a href="#popup" class="popup-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options1" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options1" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        
                            $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (2==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button2" class="default"></div></td>
                                <td>2</td>
                                <td>Bases de Licitacion</td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo2">
                                    </span></td>
                                <td><a href="#popup2" class="popup2-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options2" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options2" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion2"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button2" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>2</p></td>
                                <td><p style="color:#27AE60";>Acuerdo Modalidad de Ejecucion</p></td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo2" disabled>
                                    </span>
                                    <input name="archivo2" type="file" style="display: none;"/></td>
                                <td><a href="#popup2" class="popup2-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options2" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options2" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion2"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        
                            $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (3==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button3" class="default"></div></td>
                                <td>3</td>
                                <td>Convocatoria</td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo3">
                                    </span></td>
                                <td><a href="#popup3" class="popup3-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options3" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options3" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion3"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button3" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>3</p></td>
                                <td><p style="color:#27AE60";>Convocatoria</p></td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo3" disabled>
                                    </span>
                                    <input name="archivo3" type="file" style="display: none;"/></td>
                                <td><a href="#popup3" class="popup3-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options3" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options3" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion3"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        
                            $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (4==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button4" class="default"></div></td>
                                <td>4</td>
                                <td>Junta de Aclaraciones</td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo4">
                                    </span></td>
                                <td><a href="#popup4" class="popup4-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options4" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options4" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion4"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button4" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>4</p></td>
                                <td><p style="color:#27AE60";>Junta de Aclaraciones</p></td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo4" disabled>
                                    </span>
                                    <input name="archivo4" type="file" style="display: none;"/></td>
                                <td><a href="#popup4" class="popup4-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options4" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options4" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion4"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        
                            $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (5==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button5" class="default"></div></td>
                                <td>5</td>
                                <td>Oficio de Invitacion</td>
                                <td>
                                    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo5">
                                    </span>
                                </td>
                                <td><a href="#popup5" class="popup5-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options5" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options5" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion5"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button5" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>5</p></td>
                                <td><p style="color:#27AE60";>Oficio de Invitacion</p></td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo5" disabled>
                                    </span>
                                    <input name="archivo5" type="file" style="display: none;"/></td>
                                <td><a href="#popup5" class="popup5-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options5" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options5" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion5"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (6==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button6" class="default"></div></td>
                                <td>6</td>
                                <td>Acta de Apertura de Propuesta Economica y Tecnica</td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo6">
                                    </span></td>
                                <td><a href="#popup6" class="popup6-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options6" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options6" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion6"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button6" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>6</p></td>
                                <td><p style="color:#27AE60";>Acta de Apertura de Propuesta Economica y Tecnica</p></td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo6" disabled>
                                    </span>
                                    <input name="archivo6" type="file" style="display: none;"/></td>
                                <td><a href="#popup6" class="popup6-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options6" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options6" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion6"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (7==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button7" class="default"></div></td>
                                <td>7</td>
                                <td>Dictameny fallo</td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo7">
                                    </span></td>
                                <td><a href="#popup7" class="popup7-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options7" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options7" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion7"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button7" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>7</p></td>
                                <td><p style="color:#27AE60";>Dictamen y fallo</p></td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo7" disabled>
                                    </span>
                                    <input name="archivo7" type="file" style="display: none;"/></td>
                                <td><a href="#popup7" class="popup7-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options7" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options7" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion7"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (8==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button8" class="default"></div></td>
                                <td>8</td>
                                <td>Contrato</td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo8">
                                    </span></td>
                                <td><a href="#popup8" class="popup8-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options8" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options8" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion8"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button8" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>8</p></td>
                                <td><p style="color:#27AE60";>Contrato</p></td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo8" disabled>
                                    </span>
                                    <input name="archivo8" type="file" style="display: none;"/></td>
                                <td><a href="#popup8" class="popup8-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options8" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options8" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion8"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (9==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button9" class="default"></div></td>
                                <td>9</td>
                                <td>Catalogo de Conseptos Contratodo</td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo9">
                                    </span></td>
                                <td><a href="#popup9" class="popup9-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options9" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options9" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion9"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button9" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>9</p></td>
                                <td><p style="color:#27AE60";>Catalogo de Conseptos Contratodo</p></td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo9" disabled>
                                    </span>
                                    <input name="archivo9" type="file" style="display: none;"/></td>
                                <td><a href="#popup9" class="popup9-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options9 id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options9" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion9"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                       $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (10==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button10" class="default"></div></td>
                                <td>10</td>
                                <td>Programa de Ejecucion de la Obra</td>
                                <td><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo10">
                                    </span></td>
                                <td><a href="#popup10" class="popup11-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options10" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options10" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion10"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button10" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>10</p></td>
                                <td><p style="color:#27AE60";>Programa de Ejecucion de la Obra</p></td>
                                <td>
                                    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo10" disabled>
                                    </span>
                                    <input name="archivo10" type="file" style="display: none;"/></td>
                                <td><a href="#popup10" class="popup10-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options10" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options10" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion10"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        $ban=0;
                            $vali = DB::table('fase_dos')->where('id_Pro', $id)->pluck('numero');
                            for ($i=0; $i < count($vali); $i++) { 
                                if (11==$vali[$i]){
                                    $ban=1;
                                }
                            }
                            if ($ban==0){
                        ?>
                            <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button11" class="default"></div></td>
                                <td>11</td>
                                <td>Convenio de Apleacion de Contrato</td>
                                <td>
                                    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo11">
                                    </span>
                                </td>
                                <td><a href="#popup11" class="popup11-link" disabled>Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options11" id="option1" autocomplete="off" value="1" checked>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options11" id="option2" autocomplete="off" value="0">NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion11"></textarea></td>
                            </tr>
                        <?php }
                            #aquie de deve desactivar los botones
                            else{?>
                                <tr class="active ">
                                 {!! Form::open(['route'=>['boton2',$adquisicion],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                <td><div class="text-center"><input type="checkbox" name="check_button11" class="default" checked disabled></div></td>
                                <td><p style="color:#27AE60";>11</p></td>
                                <td><p style="color:#27AE60";>Convenios de Apleacion de Contrato</p></td>
                                <td>
                                    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

                                    <span class="btn btn-primary btn-file">
                                        Subir archivo <input type="file" name="archivo11" disabled>
                                    </span>
                                    <input name="archivo11" type="file" style="display: none;"/></td>
                                <td><a href="#popup11" class="popup11-link">Ver PDF</a></td>

                                <td><div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="options11" id="option1" autocomplete="off" value="1" checked disabled>A
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options11" id="option2" autocomplete="off" value="0" disabled>NA
                                        </label>
                                    </div></td>
                                <td><textarea class="form-control" rows="2" maxlength= 100 name="descripcion11"></textarea></td>
                            </tr>
                        <?php } 
                            /*=====================================================================================*/
                        ?>

                    <tr class="active ">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>

                        <td></td>
                        <td>{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}</td>
                    </tr>

                    </tbody>
                </table>
                <div class="modal-wrapper" id="popup">
                   <div class="popup-contenedor">
                        <h2>Acuerdo Modalidad de Ejecucion</h2>
                         <?php
                            $pdf1=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',1)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf1);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup1-body" id="pdfdoc" src="{{asset($pdf1[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                            ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
                  <div class="modal-wrapper" id="popup2">
                   <div class="popup2-contenedor">
  <?php
                            $pdf2=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',2)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf2);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup2-body" id="pdfdoc" src="{{asset($pdf2[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                            ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup2-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>

                <div class="modal-wrapper" id="popup3">
                   <div class="popup3-contenedor">
                        <h2>Convocatoria</h2>
                         <?php
                            $pdf3=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',3)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf3);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup3-body" id="pdfdoc" src="{{asset($pdf3[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                            ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup3-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
                <div class="modal-wrapper" id="popup4">
                   <div class="popup4-contenedor">
                        <h2>Junta de Aclaraciones</h2>
                          <?php
                            $pdf4=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',4)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf4);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup4-body" id="pdfdoc" src="{{asset($pdf4[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                            ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup4-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
                <div class="modal-wrapper" id="popup5">
                   <div class="popup5-contenedor">
                        <h2>Oficio de Invitacion</h2>
                         <?php
                            $pdf5=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',5)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf5);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup5-body" id="pdfdoc" src="{{asset($pdf5[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                            ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup5-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
                <div class="modal-wrapper" id="popup6">
                   <div class="popup6-contenedor">
                        <h2>Acta de Apertura de Propuesta Economica y Tecnica</h2>
                        <?php
                            $pdf6=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',6)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf6);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup6-body" id="pdfdoc" src="{{asset($pdf6[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                            ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>  
                        <a class="popup6-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
                <div class="modal-wrapper" id="popup7">
                   <div class="popup7-contenedor">
                        <h2>Dictamen y Fallo</h2>
                         <?php
                            $pdf7=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',7)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf7);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup7-body" id="pdfdoc" src="{{asset($pdf7[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                            ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup7-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
                <div class="modal-wrapper" id="popup8">
                   <div class="popup8-contenedor">
                        <h2>Contrato</h2>
                         <?php
                            $pdf8=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',8)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf8);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup8-body" id="pdfdoc" src="{{asset($pdf8[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                            ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup8-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
                <div class="modal-wrapper" id="popup9">
                   <div class="popup9-contenedor">
                        <h2>Catalogo de Conseptos Contratodo</h2>
                        <?php
                            $pdf9=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',9)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf9);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup9-body" id="pdfdoc" src="{{asset($pdf9[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                              ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup9-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
                <div class="modal-wrapper" id="popup10">
                   <div class="popup10-contenedor">
                        <h2>Programa de Ejecucion de la Obra</h2>
                         <?php
                            $pdf10=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',10)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf10);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup10-body" id="pdfdoc" src="{{asset($pdf10[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                                ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup10-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
                <div class="modal-wrapper" id="popup11">
                   <div class="popup11-contenedor">
                        <h2>Convenio de ApleaciondeContrato</h2>
                         <?php
                            $pdf11=DB::table('fase_dos')->where('id_Pro', $adquisicion)->where('numero',11)->pluck('path_file_pdf');
                            $tamaño=sizeof($pdf11);
                            if($tamaño==1){
                        ?>
                        <iframe class="popup11-body" id="pdfdoc" src="{{asset($pdf11[$tamaño-1])}}" width="100%" height="500px"></iframe>
                        <?php
                            }
                            else{
                                ?>
                                <h3>El Archivo no Existe</h3>
                        <?php    
                            }
                        ?>
                        <a class="popup11-cerrar" href="{{route('Adjuntacion.edit',$adquisicion)}}">X</a>
                   </div>
                </div>
                <?php  
                    /*=====================================================================================*/
                ?>
            </div>
        </div>
    </div>
@endsection