<section id="cover bg-white">
        <div id="cover-texto bg-white">
          <!--div class="container bg-dark"-->
            <div class="bg-white">
            <div class="row bg-white"> 
              <div class="col-sm-15 bg-white">
                <img class="d-block bg-white" src="Estilos/img/encabezado.png">
                <!--h1 class="display-3">SIROPA</h1>
                <p>Sistema De Investigacion De Obras Públicas y Adquisiciones</p-->
              </div>
            </div>
          </div>
        </div>

      </section>
     
    
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
      <a class="navbar-brand" href="#">Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/admin') }}">Administrador </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contactos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('/ato') }} ">Atolinga</a>
              <a class="dropdown-item" href="{{ url('/florencia') }} ">Florencia</a>
              <a class="dropdown-item" href="{{ url('/mmx') }}">Momax</a>
              <a class="dropdown-item" href="{{ url('/santa_maria') }}">Santa María</a>
              <a class="dropdown-item" href="{{ url('/tepechitlan') }}">Tepechitlán</a>
              <a class="dropdown-item" href="{{ url('/teul') }}">Teúl de González Ortega</a>
              <a class="dropdown-item" href="{{ url('/tgo') }}">Tlaltenango de Sánchez Román</a>
              <a class="dropdown-item" href="{{ url('/garcia') }}">García de la Cadena</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/funcion_publica') }}">Función Pública</a>
            </div>
          </li>

          
        </ul>
        <FORM class="form-inline my-2 my-lg-0" method=GET action="http://www.google.es/search"> 
          
          <INPUT TYPE=text id="s" name="q"  value="" class="form-control mr-sm-2" placeholder="Buscar" aria-label="Buscar" />

          <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </div>
    </nav>