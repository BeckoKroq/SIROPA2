@extends('layout.cont')

@section('content')
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h3 class="border-bottom border-gray pb-2 mb-0">MOMAX</h3>
        <div class="media text-muted pt-5">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Nombre</strong>
            L.A. Nayelli Ramírez Gaeta
          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Domicilio</strong>
            C. Allende #13
          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Teléfonos</strong>
            (437) 991 0021</br>
            (437) 991 0034

          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-4 rounded">
          <p>
            <strong class="d-block text-gray-dark">Correo electrónico</strong>
            nayelirtg@hotmail.com
          </p>
        </div>

        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-4 rounded">
          <p >
            <strong class="d-block text-gray-dark">Código postal</strong>
            99720
          </p>
        </div>
        
      </div>

      <div style="position:absolute;  top:280px; left:400px; visibility:visible z- index:1" >
        <!--border: silver 1px solid ;-->
        <img class="d-block bg-dark-center" src="Estilos/img/momax.jpg"  width=200, height=210>
      </p>
        
      </div>


  <footer class="page-footer font-small bg-dark pt-4 mt-4">
      
                   @include('CCP/footer')
      
      </footer>
@endsection