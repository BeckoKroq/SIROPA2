@extends('layout.cont')

@section('content')
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h3 class="border-bottom border-gray pb-2 mb-0">FUNCIÓN PÚBLICA</h3>
        <div class="media text-muted pt-5">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Nombre</strong>
            Ana
          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Domicilio</strong>
            Circuito Cerro del Gato # 1900
          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Teléfonos</strong>
             (492) 491 5000</br>
             (492) 925 6540

          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-4 rounded">
          <p>
            <strong class="d-block text-gray-dark">Correo electrónico</strong>
           zac@gmail.com
          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Código postal</strong>
            98160
          </p>
        </div>
        
      </div>

      <div style="position:absolute;  top:250px; left:500px; visibility:visible z- index:1" >
        <!--border: silver 1px solid ;-->
        <img class="d-block bg-dark-center" src="Estilos/img/Zacatecas.jpg"  width=500, height=300>
      </p>
        
      </div>

  <footer class="page-footer font-small bg-dark pt-4 mt-4">
      
                   @include('CCP/footer')
      
      </footer>
@endsection
