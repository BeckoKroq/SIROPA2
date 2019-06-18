@extends('layout.cont')

@section('content')
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h3 class="border-bottom border-gray pb-2 mb-0">TRINIDAD GARCÍA DE LA CADENA</h3>
        <div class="media text-muted pt-5">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Nombre</strong>
            C. María de Jesús Cortés Olaez
          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Domicilio</strong>
            C. Francisco García Salinas #3  
          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Teléfonos</strong>
            (467) 969 0188</br>
            (467) 969 0096

          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-4 rounded">
          <p>
            <strong class="d-block text-gray-dark">Correo electrónico</strong>
            martinychuyita_17@hotmail.com
          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Código postal</strong>
            99830
          </p>
        </div>
        
      </div>
      <div style="position:absolute;  top:280px; left:400px; visibility:visible z- index:1" >
        <!--border: silver 1px solid ;-->
        <img class="d-block bg-dark-center" src="Estilos/img/garcia.jpg"  width=200, height=210>
      </p>
        
      </div>

  <footer class="page-footer font-small bg-dark pt-4 mt-4">
      
                   @include('CCP/footer')
      
      </footer>
@endsection
