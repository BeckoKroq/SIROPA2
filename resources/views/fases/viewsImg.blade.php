@extends('layout.admin')
@section('tilte','Evidencia Fotogrefica')
@section('content')
	<div class="alert alert-info text-center font-weight " >
		<?php use Illuminate\Support\Facades\DB; ?>
	    <h1><?php $Nom= DB::table('proyectos')->where('id', $proyecto)->pluck('nombre_proyecto');
	          echo $Nom[0];
	    ?> </h1>
	</div>
	{!!link_to_route('proyecto.show', $title='Regresar a proyecto', $parameters = $proyecto, $attributes=['class'=>'btn btn-success sm'])!!}
	<br>
	<br>
	<div class="row">
		@foreach($images as $image)
			@if($image->numero==1)
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="{{asset($image->path_file_pdf)}}" class="img-responsive">
						</div>
					</div>
				</div>
			@endif
		@endforeach
	</div>
@endsection