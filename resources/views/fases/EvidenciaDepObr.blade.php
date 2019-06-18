@extends('layout.admin')
@section('content')
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
                {{-- < link rel="stylesheet" type="text/css" href="../../AdminStyle/css/Option.css"> --}}
                <div class="alert alert-info text-center font-weight" >
                    Evidencia
                </div>
                <table class="table">
                    <thead>
                        <tr class="success">
                            <th>Documentos</th>
                            <th>Archivo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
							{!! Form::open(['route'=>['boto16',$proyecto],'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data']) !!}
                            <td>Reporte Fotográfico de Obra</td>
                            <td>
                                <span class="btn btn-success btn-file">
							    	Subir Fotos <input type="file" name="archivo16[]" multiple="multiple" class="dz-hidden-input">
								</span>
                            </td>
                            <td>
                            </td>   
                        </tr>
                        <tr>
                            <td>Cheques</td>
                            <td>
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                <span class="btn btn-success btn-file">
                                    Subir Foto <input type="file" name="archivo17[]" multiple="multiple" class="dz-hidden-input">
                                </span>
                            </td>
                            <td>
                            </td>   
                        </tr>
                        <tr>
                            <td>Estimaciones</td>
                            <td>
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                <span class="btn btn-success btn-file">
                                    Subir archivo <input type="file" name="archivo18">
                                </span>
                            </td>
                            <td>
                            </td>   
                        </tr>
                        <tr>
                            <td>Generadores</td>
                            <td>
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                <span class="btn btn-success btn-file">
                                    Subir archivo <input type="file" name="archivo19">
                                </span>
                            </td>
                            <td>
                            </td>   
                        </tr>
                        <tr>
                            <td>Avance Fisico y Financiero</td>
                            <td>
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                                <span class="btn btn-success btn-file">
                                    Subir archivo <input type="file" name="archivo21">
                                </span>
                            </td>
                            <td>
                            </td>   
                        </tr>
                        <tr>
                        	<td></td>
                        	<td></td>
                        	<td>
                        		{!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
                {!!link_to_route('proyecto.show', $title='Regresar a proyecto', $parameters = $proyecto, $attributes=['class'=>'btn btn-success sm'])!!}
                <br></br>
            </div>
        </div>
    </div>
@endsection