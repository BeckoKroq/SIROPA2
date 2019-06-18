<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    @include('CCP/head')
</head>
<body>
<header>
    @include('CCP/header')
</header>

@section('content')
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow contenedor">
        <img class="mr-3" src="https://getbootstrap.com/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Bootstrap</h6>

        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">TLALTENANGO DE SÁNCHEZ ROMÁN</h6>

        <div class="media text-muted pt-3">

            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">

            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Nombre</strong>
                Luz Elena
            </p>
        </div>
        <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Teléfono</strong>
                437 100 5197
            </p>
        </div>
        <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Dirección</strong>
                Tlaltenango...
            </p>
        </div>

        <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Correo</strong>
                Tlaltenango123@hotmail.com
            </p>
        </div>


    </div>

    <div style="position:absolute;  top:280px; left:400px; visibility:visible z- index:1" >
        <!--border: silver 1px solid ;-->
        <img class="d-block bg-dark-center" src="Estilos/img/tlaltenango.jpg"  width=200, height=210>
        </p>

    </div>

@stop

@yield('content')

<footer class="page-footer font-small bg-dark pt-4 mt-4">

    @include('CCP/footer')

</footer>