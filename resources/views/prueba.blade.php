<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="{{ public_path('plugins/bootstrap/css/bootstrap.css')}}">
    <br>
    <img src="{{ public_path('Estilos/img/encabezado2.png')}}">
    <title>PDF</title>
</head>
<body>
	<style type="text/css" media="screen">
		* {
		  margin: 0;
		  padding: 0;
		  box-sizing: border-box;
		}

		body {
		  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
		  color: #333;
		}

		table {
		  text-align: left;
		  line-height: 40px;
		  border-collapse: separate;
		  border-spacing: 0;
		  border: 2px solid #C4C4C4;
		  width: 95%;
		  margin: 50px auto;
		  border-radius: .25rem;
		}

		thead tr:first-child {
		  text-align: center;
		  background:#C4C4C4;
		  color: #fff;
		  border: none;
		}

		th:first-child,
		td:first-child {
		  padding: 0 15px 0 20px;
		}

		th {
		  font-weight: 500;
		}

		thead tr:last-child th {
		  border-bottom: 3px solid #ddd;
		}

		tbody tr:hover {
		  background-color: #C4C4C4;
		  cursor: default;
		}

		tbody tr:last-child td {
		  border: none;
		}

		tbody td {
		  border-bottom: 1px solid #C4C4C4;
		}

		td:last-child {
		  text-align: right;
		  padding-right: 10px;
		}

		.button {
		  color: #aaa;
		  cursor: pointer;
		  vertical-align: middle;
		  margin-top: -4px;
		}

		.edit:hover {
		  color: #0a79df;
		}

		.delete:hover {
		  color: #dc2a2a;
		}	
	</style>
	<table class="table">
		<thead>
			<tr>
			  <th colspan="3">Etapa Planeación y Programación</th>
			</tr>
			<tr>
			      <th>Documento</th>
			      <th>Nombre del Archivo</th>
			      <th>Subido Por</th>
			</tr>
		</thead>
		<tbody>
			@php
			      $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Oficio de Aprobación con Anexos Técnicos</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('subidox');
			@endphp
			@if(count($che) != 0)	
				<tr class="active ">
		          <td>Cédula de Información Básica</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('subidox');
		    @endphp
			@if(count($che) != 0)
		  		<tr class="active ">
		          <td>Catálogo de Conceptos Preliminares</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
            	</tr>
            @endif
            @php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('subidox');
		    @endphp
			@if(count($che) != 0)
		  		<tr class="active ">
		          <td>Calendarización Preliminar</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
		        </tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Validación y Dictamen de Factibilidad</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
		        </tr>
			@endif
			 @php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Croquis de Localización de la Obra</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Proyecto de la Obra</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Permiso de la Obra</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Acta de Aceptación de Comunidad o Beneficiarios</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Acta Constitutiva de Comité</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Registro de Asistencia de Comité</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Acta de Aceptación de la Obra</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Proyecto Ejecutivo</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Presupuesto Base</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',15)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Estudios de Mecánica de Suelos</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',16)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Impacto Ambiental</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',17)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Uso de Suelo</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',18)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Permisos y Licencia</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',19)->pluck('subidox');
		    @endphp
		    @if(count($che) != 0)
		  		<tr class="active ">
		          <td>Tenencia de la Tierra</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
		          $che= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('permiso_check');
		          $nomArch= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('nombre_archivo_sub');
		          $subidox= DB::table('_fase_uno')->where('obras_publicas_id', $proyecto)->where('numero',20)->pluck('subidox');
		    @endphp
			@if(count($che) != 0)
		  		<tr class="active ">
		          <td>Convenio de Colaboración</td>
		          <td>@php echo $nomArch[0]; @endphp</td>
		          <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
		</tbody>
	</table>
	<table>
		<thead>
			<tr>
		      <th colspan="3">Adjuntación</th>
		    </tr>
		    <tr>
		          <th>Documento</th>
		          <th>Nombre del Archivo</th>
		          <th>Subido Por</th>
		    </tr>
		</thead>
		<tbody>
			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Acuerdo Modalidad de Ejecución</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif	
			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Bases de Licitación</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif

			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Convocatoria</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif	

			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Junta de Aclaraciones</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif

			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Oficio de Invitación</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif

			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Acta de Apertura de Propuesta Económica y Técnica</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif

			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Dictamen y Fallo</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif

			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Contrato</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif

			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Catálogo de Conceptos Contratado</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif

			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Programa de Ejecución de la Obra</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif

			@php
			      $che= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('permiso_check');
			      $nomArch= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('fase_dos')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Convenio de Apelación de Contrato</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
		</tbody>
	</table>
	<table>
		<thead>
			<tr>
		      <th colspan="3">Etapa Ejecución</th>
		    </tr>
		    <tr>
		          <th>Documento</th>
		          <th>Nombre del Archivo</th>
		          <th>Subido Por</th>
		    </tr>
		</thead>
		<tbody>
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',1)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Auxiliar de Obra Contable</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',2)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Fianza de Cumplimiento</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',3)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Pólizas</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',4)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Facturas Listas de Raya Recibos Oficiales</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',5)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Estimaciones</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',6)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Generadores</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',7)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Bitácora de la Obra</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',8)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Reporte Fotográfico de Obra</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',9)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Pruebas de Laboratorio</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',10)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Acta Entrega Recepción</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',11)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Fianza de Vicios Ocultos</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',12)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Finiquito</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',13)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Documentos de Resición Administrativa del Contrato</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
			@php
			      $che= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('permiso_check');
			      $nomArch= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('nombre_archivo_sub');
			      $subidox= DB::table('_fase_tres')->where('obras_publicas_id', $proyecto)->where('numero',14)->pluck('subidox');
			@endphp
			@if(count($che) != 0)
				<tr class="active ">
				  <td>Tarjetas de Precio</td>
				  <td>@php echo $nomArch[0]; @endphp</td>
				  <td>@php echo $subidox[0]; @endphp</td>
				</tr>
			@endif
		</tbody>
	</table>
    <script src="{{public_path('plugins/jquery/js/jquery-3.3.1.js')}}"></script>
    <script src="{{public_path('plugins/bootstrap/js/bootstrap.js')}}"></script>
</body>
</html>
