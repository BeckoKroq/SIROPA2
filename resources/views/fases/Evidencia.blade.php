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
                            <th>Documento</th>
                            <th>Archivo</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<tr>
                    		<td>Reporte Fotográfico de Obra</td>
                            <td>{!!link_to_route('img.index', $title='', $parameters = $proyecto, $attributes=['class'=>'far fa-images fa-2x'])!!}</td>	
                    	</tr>
                        <tr>
                            <td>Cheque</td> 
                            <?php $list_pdf= DB::table('evidencia')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('path_file_pdf')?>
                            <?php $pdf3 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('evidencia')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('path_file_pdf')?>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf3 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                <td>
                                    <a href="#popup20_f1" class="far fa-file-image fa-2x"></a>
                                </td> 
                            @endif    
                        </tr>
                        <tr>
                            <td>Estimaciones</td>  
                            <?php $list_pdf= DB::table('evidencia')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('path_file_pdf')?>
                            <?php $pdf1 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('evidencia')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('path_file_pdf')?>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf1 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                <td>
                                    <a href="#popup_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>  
                            @endif
                        </tr>
                        <tr>
                            <td>Generadores</td>    
                            <?php $list_pdf= DB::table('evidencia')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('path_file_pdf')?>
                            <?php $pdf2 = ''?>
                            @if(strlen($list_pdf)>6)
                                <?php $list_pdf= DB::table('evidencia')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('path_file_pdf')?>
                                    @for($i=0; $i<=count($list_pdf); $i++)
                                        @if($i == count($list_pdf))
                                            <?php $pdf2 = $list_pdf[$i-1]?>
                                        @endif
                                    @endfor
                                <td>
                                    <a href="#popup19_f1" class="far fa-file-pdf fa-2x" style="color:red"></a>
                                </td>  
                            @endif
                        </tr>
                        <tr>
                            <td>Avance Fisico y Financiero</td>    
                        </tr>
                    </tbody>
                </table>
                {!!link_to_route('proyecto.show', $title='Regresar a proyecto', $parameters = $proyecto, $attributes=['class'=>'btn btn-success sm'])!!}
                <br></br>
            </div>
        </div>
    </div>
    <div class="modal-wrapper" id="popup_f1">
        <div class="popup_f1-contenedor">
            <h2>Estimaciones</h2>
            <iframe  class="popup_f1-body" id="pdfdoc" src="{{asset($pdf1)}}"  width="100%" height="500px"></iframe>
            <a class="popup_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup19_f1">
        <div class="popup19_f1-contenedor">
            <h2>Generadores</h2>
            <iframe  class="popup19_f1-body" id="pdfdoc" src="{{asset($pdf2)}}"  width="100%" height="500px"></iframe>
            <a class="popup19_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
    <div class="modal-wrapper" id="popup20_f1">
        <div class="popup20_f1-contenedor">
            <h2>Cheque</h2>
            <iframe  class="popup20_f1-body" id="pdfdoc" src="{{asset($pdf3)}}"  width="100%" height="500px"></iframe>
            <a class="popup20_f1-cerrar" href="{{ route('fasetres.edit',$proyecto) }}">X</a>
        </div>
    </div>
@endsection