@extends('layout.cont')

@section('content')
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h4 class="border-bottom border-gray pb-2 mb-0">¿Qué es SIROPA?</h4>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div  >
        <!--border: silver 1px solid ;-->
        <img class="d-block bg-dark-center" src="Estilos/img/9.jpg"  width=500, height=300>
      </p>
        
      </div>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"></strong>
            <h6>
            SIROPA es un Sistema Integral de Registro de Obra Pública y Adquisiciones, que se utiliza en las contralorías municipales como herramienta informática para la revisión, supervisión y control de los proyectos que se ejecutan por la administración municipal. 
Permite registrar información documental en las etapas de Planeación y  Programación de los proyectos aprobados, adjudicación, ejecución y recepción de los trabajos realizados. Con la finalidad de evitar irregularidades en el proceso y prevenir inconsistencias de tipo material, documental y financiera.</h6>

          </p>
        </div>

      

  <footer class="page-footer font-small bg-dark pt-4 mt-4">
      
                   @include('CCP/footer')
      
      </footer>
@endsection