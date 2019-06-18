@extends('layout.admin')

@section('content')

<meta charset="UTF-8">

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info text-center font-size:24">
                Adjuntación y Contratación Directa</div>
            
            <table class="table">
                <thead>
                    <tr>
                      <th>Documento</th>
                        <th>Archivo</th>
                        <th>Fecha de carga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>Estudio de mercado presentar al menos 3 cotizaciones y/o presupuesto de proveedores y/o contratista</td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                    </tr>
                   <table class="table table-striped table-responsive-md btn-table">

    <!--Table head-->
    <thead>
        <tr>
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

        <table class="table">
                <thead>
                    <tr>
                      <th>Dictamen de adjudicación</th>
                        <th>Archivo</th>
                        <th>Fecha de dictamen</th>
                        <th>Fecha de carga</th>
                        <th>Notas</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                      <td></td>
                        <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
                        <td></td>
                        <td></td>
                        <td><textarea class="form-control" rows="2"></textarea></td>
                    </tr>

                    <tr>
                        <td>Nombre</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>

                <tr>
                        <td>Monto</td>
                      <td><div class="form-group">
                          {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div></td>
                    </tr>


                    <tr>
                      <th >Contratación</th>
                        <th>Archivo</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

            <table class="table">
                
                <tbody>

                    <tr>
                      <td></td>
                       <td></td>
                      <td>{!! Form::submit('Cargar PDF',['class'=>'btn btn-success']) !!}</td>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>

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
                
                <thead>
                    <tr>
                      <th>Pólizas</th>
                    </tr>
                </thead>




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
                  


        
    </tbody>
    <!--Table body-->

</table>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection