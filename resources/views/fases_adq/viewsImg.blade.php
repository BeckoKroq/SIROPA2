@extends('layout.admin')
@section('tilte','Evidencia Fotogrefica')
@section('content')
	<div class="alert alert-info text-center font-weight " >
		<?php use Illuminate\Support\Facades\DB; ?>
	    <h1><?php $Nom= DB::table('adquisicions')->where('id', $adquisicion)->pluck('nombre_adquisicion');
	          echo $Nom[0];
	    ?> </h1>
	</div>
	{!!link_to_route('adquisicion.show', $title='Regresar a adquisicion', $parameters = $adquisicion, $attributes=['class'=>'btn btn-success sm'])!!}
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