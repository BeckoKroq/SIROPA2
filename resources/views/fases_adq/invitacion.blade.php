@extends('layout.admin')

@section('content')

<meta charset="UTF-8">

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info text-center font-size:24">
                Adjuntación y Contratación Invitación</div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                      <th>Documento</th>
                      <th>Archivo</th>
                      <th> Fecha</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                      <td>Bases de Licitación</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                      <td>2</td>
                      <td>Convocatoria/Invitación</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

    <!--Table head-->
    <thead>
        <tr>
            <th>2.1</th>
            <th>Nombre de persona fisica o Moral</th>
            <th>RFC</th>
            <th>Domicilio</th>
            <th>Teléfono</th>
            <th>Correo</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        <tr>
            <th> </th>
            <th scope="row"><div class="form-group">
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></th>
            <td><div class="form-group">
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>
            <td><div class="form-group">
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>

			<td><div class="form-group">
				          {!! Form::number('telefono',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>
			<td><div class="form-group">
				          {!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>
        </tr>


        <tr>
            <th> </th>

            <th scope="row"><div class="form-group">
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></th>
            <td><div class="form-group">
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>
            <td><div class="form-group">
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>

			<td><div class="form-group">
				          {!! Form::number('telefono',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>
			<td><div class="form-group">
				          {!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>
        </tr>


        <tr>
            <th> </th>

            <th scope="row"><div class="form-group">
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></th>
            <td><div class="form-group">
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>
            <td><div class="form-group">
				          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>

			<td><div class="form-group">
				          {!! Form::number('telefono',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>
			<td><div class="form-group">
				          {!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'']) !!}
				        </div></td>
        </tr>

                </tbody>
            </table>

<div class="alert alert-error text-center font-size:22">
                INVITACION DE CUANDO MENOS 3</div>


<table class="table">
                
                <tbody>

                    <tr>
                      <td>3</td>
                      <td>Oficio de Aceptación por el contratista para realizar la obra</td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

                </tbody>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        <th>3.1</th>
                      <th>Nombre De Persona Fisica o Moral</th>
                      <th>Archivo</th>
                      <th> Fecha De Carga</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>2</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>3</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

            </table>



<div class="alert alert-error text-center font-size:22">
                Invitación al Órgano de Control para el acto de presentación y apertura de proposiciones en caso de Invitación a cuando menos tres personas.</div>



<table class="table">
                <thead>
                    <tr>
                        <th>5</th>
                      <th>Documento</th>
                      <th>Archivo</th>
                      <th> Fecha De Carga</th>
                      <th>Fecha De Visita</th>
                      <th>Nota</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                      <td>Acta de Visita al sito de la Obra</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                        <td></td>
                        <td><textarea class="form-control" rows="2"></textarea></td>
                    </tr>

                   <table class="table table-striped table-responsive-md btn-table">

    <!--Table head-->
    

                </tbody>
            </table>

<table class="table">
                <thead>
                    <tr>
                        <th>5.1</th>
                      <th>Nombre De Los Que Asistieron</th>
                      <th> Selección</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>2</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>3</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        <td></td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

            </table>


<table class="table">
                <thead>
                    <tr>
                        <th>6</th>
                      <th>Documento</th>
                      <th>Archivo</th>
                      <th> Fecha De Carga</th>
                      <th>Fecha De Junta</th>
                      <th>Nota</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                      <td>Junta de Aclaraciones</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                        <td></td>
                        <td><textarea class="form-control" rows="2"></textarea></td>
                    </tr>

                   <table class="table table-striped table-responsive-md btn-table">

    <!--Table head-->
    

                </tbody>
            </table>




<table class="table">
                
                <tbody>

                    <tr>
                      <td>7</td>
                      <td>Presentación De Propuestas Técnicas Económicas</td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

                </tbody>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        <th>7.1</th>
                      <th>Nombre De Persona Física o Moral</th>
                      <th>Archivo</th>
                      <th>Monto De La Propuesta</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>

                    <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                    <tr>
                        <td>2</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                    <tr>
                        <td>3</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

            </table>




<table class="table">
                
                <tbody>

                    <tr>
                      <td>8</td>
                      <td>Dictamen y Fallo</td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

                </tbody>
            </table>

    <table class="table">
                <thead>
                    <tr>
                        <th>8.1</th>
                      <th>Documento</th>
                      <th>Archivo</th>
                      <th> Fecha De Dictamen Y Fallo</th>
                      <th>Fecha De Carga</th>
                      <th>Notas</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                      <td>Junta de Aclaraciones</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                        <td></td>
                        <td><textarea class="form-control" rows="2"></textarea></td>
                    </tr>

                   <table class="table table-striped table-responsive-md btn-table">

    <!--Table head-->
    

                </tbody>
            </table>

            <table class="table">
                <thead>
                    <tr>
                    
                      <th>Nombre Del Contratista</th>
                      <th>Monto</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                    <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                    

                   
                   <table class="table table-striped table-responsive-md btn-table">

            </table>



<table class="table">
                
                <tbody>

                    <tr>
                      <td>9</td>
                      <td>Contratación</td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

                </tbody>
            </table>

            <table class="table">

                    <tr>
                        <td>Nombre De La Obra</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                    <tr>
                        <td>No. De Contrato</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                                        <tr>
                        <td>Fecha de Contrato</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                                        <tr>
                        <td>Monto Contratado</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                                        <tr>
                        <td>Fondo o Programa</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                                        <tr>
                        <td>Incio de la Obra</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                        <tr>
                        <td>Termino de la Obra</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                       <tr>
                        <td>Periodo de Ejecución</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>
                    

                    <tr>
                        <td>Anticipo</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>
                    <table class="table table-striped table-responsive-md btn-table">

            </table>


<table class="table">
                
                <tbody>

                    <tr>
                      <td>10</td>
                      <td>Pólizas</td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

                </tbody>
            </table>




    <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        
                     <th>Aplica</th>
                      <th>Archivo</th>
                      <th> Fecha Emisión</th>
                      <th>Fecha Vencimiento</th>
                      <th>Monto Garantía</th>
                      <th>Empresa Que Emite</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>Anticipo</td>
                      <td>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">SI
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">NO
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">NA
                            </label>
                        </td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                        <td></td>

                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>

                        <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        
                    </tr>


<tr>
                      <td>Cumplimiento</td>
                      <td>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">SI
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">NO
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">NA
                            </label>
                        </td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                        <td></td>

                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>

                        <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        
                    </tr>


<tr>
                      <td>Vicios Ocultos</td>
                      <td>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">SI
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">NO
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio">NA
                            </label>
                        </td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                        <td></td>

                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>

                        <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                        
                    </tr>

                   <table class="table table-striped table-responsive-md btn-table">

    <!--Table head-->
    

                </tbody>
            </table>





        </div>
    </div>
</div>


@endsection