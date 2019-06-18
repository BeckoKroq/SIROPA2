<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>


    <!-- Bootstrap Core CSS -->
    <!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    {!!Html::style('AdminStyle/bootstrap/css/bootstrap.min.css')!!}

    <!-- MetisMenu CSS -->
    <!--<link href="metisMenu/metisMenu.min.css" rel="stylesheet">-->
    {!!Html::style('AdminStyle/metisMenu/metisMenu.min.css')!!}

    <!-- Custom CSS -->
    <!--<link href="dist/css/sb-admin-2.css" rel="stylesheet">-->
    {!!Html::style('AdminStyle/dist/css/sb-admin-2.css')!!}

    <!-- Custom Fonts -->
    <!--<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    {!!Html::style('AdminStyle/font-awesome/css/font-awesome.min.css')!!}
    {!!Html::style('font-awesome/css/all.css')!!}
    <link rel="stylesheet" href="/sweetalert2/dist/sweetalert2.css">
    <script src="/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="/vendor/sweetalert/sweetalert.all.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!!Html::style('AdminStyle/dist/css/jquery-confirm.min.css')!!}

    {!!Html::style('AdminStyle/css/stilo.css')!!}
    {!!Html::style('AdminStyle/css/style_faseUno.css')!!}
    {!!Html::style('AdminStyle/css/ownstyle.css')!!}
    <img align="center" class="d-block bg-white" src="{{asset('Estilos/img/encabezado.png')}}">



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin Siropa Dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                    <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                    {{auth()->user()->nombre}}
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>

                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>

                        <li class="divider"></li>
                        @if (auth()->check())
                          <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout {{auth()->user()->nombre}}</a>
                          </li>
                        @endif

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              @if (auth()->user()->hasRoles(['Función Pública']))
                                <li>
                                    <a href="{{ route('usuario.create') }}" class="fa fa-plus fa-fw">Agregar</a>
                                </li>
                                <li>
                                    <a href="{{ url('/usuario') }}" class="fa fa-list fa-fw">Lista</a>
                                </li>
                              @endif

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Obras Públicas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
                                  <li>
                                      <a href="{{ route('proyecto.create') }}" class="fa fa-plus fa-fw">Agregar</a>
                                  </li>
                                @endif
                                <li>
                                    <a href="{{ url('/proyecto') }}" class="fa fa-list fa-fw">Lista</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Adquisiciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
                                <li>
                                    <a href="{{route('adquisicion.create')}}" class="fa fa-plus fa-fw">Agregar</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ url('/adquisicion') }}" class="fa fa-list fa-fw">Lista</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper  hasta aqui puto-->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    {!!Html::script('AdminStyle/jquery/jquery.js')!!}
    <!--<script src="jquery/jquery.min.js"></script>-->

    {!!Html::script('AdminStyle/jquery/jquery.min.js')!!}

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="bootstrap/js/bootstrap.min.js"></script>-->

    {!!Html::script('AdminStyle/bootstrap/js/bootstrap.min.js')!!}

    <!-- Metis Menu Plugin JavaScript -->
    <!--<script src="metisMenu/metisMenu.min.js"></script>-->
    {!!Html::script('AdminStyle/metisMenu/metisMenu.min.js')!!}

    <!-- Custom Theme JavaScript -->
    <!--<script src="js/sb-admin-2.js"></script>-->
    {!!Html::script('AdminStyle/js/sb-admin-2.js')!!}

    <!--Personal script/js-->
    {!!Html::script('AdminStyle/js/jquery-confirm.min.js')!!}
    {!!Html::script('AdminStyle/js/dropdown.js')!!}



@include('sweetalert::alert')
</body>


</body>

</html>
