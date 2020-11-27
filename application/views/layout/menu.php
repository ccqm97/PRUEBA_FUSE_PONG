<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <!--li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."index.php/Controller"?>">
        <i class="fas fa-home"></i>
          <span>Inicio</span>
        </a>
      </li-->
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="EstationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-street-view"></i>
          <span>Estaciones</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Administrar Estaciones:</h6>
          <a id="addEst"class="dropdown-item" href="<?php echo base_url()."index.php/Controller/showAddEstation"?>">Agregar Estación</a>
          <a id="editEst" class="dropdown-item" href="<?php echo base_url()."index.php/Controller/showGestionarEstation"?>">Gestionar Estaciones</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Tipo de estación:</h6>
          <a id="addTipoEst" class="dropdown-item" id="addTipo" href="#">Agregar Tipo de Estación</a>
          <a id="editTEst" class="dropdown-item" href="<?php echo base_url()."index.php/Controller/showGestionarTipoEstation"?>">Gestionar Tipo de Estación</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="WagonDropdown"href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-warehouse"></i>
          <span>Vagones</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Administrar Vagones:</h6>
          <a id="addVagon"class="dropdown-item" href="<?php echo base_url()."index.php/Controller/showAddWagon"?>">Gestionar Vagones</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="RouteDropdown"href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bus-alt"></i>
          <span>Rutas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Administrar Rutas:</h6>
          <a id="addRuta" class="dropdown-item" href="<?php echo base_url()."index.php/Controller/showAddRoute"?>">Agregar Ruta</a>
          <a id="editRuta" class="dropdown-item" href="<?php echo base_url()."index.php/Controller/showGestionarRuta"?>">Gestionar Rutas</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Troncales:</h6>
          <a id="addTroncal" class="dropdown-item" href="#">Agregar Troncal</a>
          <a class="dropdown-item" id="gestTron" href="<?php echo base_url()."index.php/Controller/showGestionarTroncales"?>">Gestionar Troncales</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="BSDropdown" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="far fa-hand-point-right"></i>
          <span>Paradero</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Administrar Paraderos:</h6>
          <a id="addBS" class="dropdown-item" href="<?php echo base_url()."index.php/Controller/showParaderos"?>">Gestionar Paraderos</a>
        </div>
      </li>
    </ul>
    <div id="content-wrapper">
    <div class="container-fluid">