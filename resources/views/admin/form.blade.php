@extends('layout.admin')

@section('content')

<meta charset="UTF-8">

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info text-center font-size:24">
                Etapa Planeación Programación</div>
            
            <table class="table">
                <thead>
                    <tr>
                      <th>1</th>
                        <th>Oficio de aprobación con anexos técnicos</th>
                        <th>Aplica</th>
                        <th>Cargar Documento</th>
                        <th>Fecha de carga</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="active">
                        <td></td>
                        <td></td>
                        <td>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">SI
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">NO
                            </label>
                        </td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                        <td><textarea class="form-control" rows="2"></textarea></td>
                    </tr>

                    <thead>
                    <tr>
                      <th>2</th>
                        <th>Cédula de información</th>
                        <th>Archivo</th>
                        <th>Fecha de carga</th>
                    </tr>

                </thead>
                    <tr>
                      <td><div class="text-center">2.1</div></td>
                        <td>Cédula de información básica</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>
                   <tr>
                      <td><div class="text-center">2.2</div></td>
                        <td>Catálogo de conceptos preliminares</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>  <div class="text-center">2.3</div></td>
                        <td>Calendarización preliminar</td>
                        <td> {!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>  <div class="text-center">2.4</div></td>
                        <td>Validación y dictamen de factibilidad</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                   <tr>
                      <td>  <div class="text-center">2.5</div></td>
                        <td>Croquis de localización de la obra</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>  <div class="text-center">2.6</div></td>
                        <td>Proyecto de la obra</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>  <div class="text-center">2.7</div></td>
                        <td>Permiso de la obra </td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>  <div class="text-center">2.8</div></td>
                        <td>Acta de aceptación de comunidad o beneficiarios</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>  <div class="text-center">2.9</div></td>
                        <td>Acta constitutiva de comité
                        	<div class="form-group">
					          {!! Form::label('Cargo') !!}
					          {!! Form::text('Cargo',null,['class'=>'form-control', 'placeholder'=>'Cargo']) !!}
					        </div>

                        <div class="form-group">
				          {!! Form::label('Nombre') !!}
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre']) !!}
				        </div></td>

                        <td>
                        	<div class="form-group">
					          {!! Form::label('Teléfono') !!}
					          {!! Form::number('telefono',null,['class'=>'form-control', 'placeholder'=>'Teléfono']) !!}
					        </div>
                        <div class="form-group">
				          {!! Form::label('Correo') !!}
				          {!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Correo']) !!}
				        </div>

        
    </td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                    </tr>

                   

                    <tr>
                      <td>  <div class="text-center">2.10</div></td>
                        <td>Registro de asistencia de comité</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    

                    <tr>
                      <td>3</td>
                        <td>Acta de aceptación de la obra</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>4</td>
                        <td>Proyecto ejecutivo</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>5</td>
                        <td>Presupuesto base</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>6</td>
                        <td>Estudios de mecánica de suelos</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>7</td>
                        <td>Impacto ambiental</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>8</td>
                        <td>Uso de suelo</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>9</td>
                        <td>Permisos y licencia</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>10</td>
                        <td>Tenencia de la tierra</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>          

                    <tr>
                      <td>11</td>
                        <td>Convenio de colaboración</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                   

                    <!--tr class="warning">
                        <td>
                            Column content
                        </td>
                        <td>
                            Column content
                        </td>
                        <td>
                            Column content
                        </td>
                    </tr>
                   
                    <tr class="danger">
                        <td>
                            Column content
                        </td>
                        <td>
                            Column content
                        </td>
                        <td>
                            Column content
                        </td>
                    </tr-->
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection