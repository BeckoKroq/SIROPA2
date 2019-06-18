@extends('layout.admin')

@section('content')

@include('alerts.request')
<br>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">

				{!! Form::open(['route'=>'municipio.store', 'method'=>'POST']) !!}
				<legend>Agregar Municipio</legend>
				<div id="msj-success" class="alert alert-success alert-dismissible" role="alert"
				style="display:none">
				<strong>Municipio Aregado Correctamente</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="form-group">
			{!! Form::label('Municipio') !!}
			{!! Form::text('municipio',null,['class'=>'form-control', 'placeholder'=>'Municipio']) !!}
			</div>
			<br>
			{!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
</div>
@endsection