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
          <a id="editEst" class="dropdown-item" href="<?php echo base_url()."index.php/Controller/showGestionarEstation"?>">Gestionar Tickets</a>
        </div>
      </li>
    </ul>
    <div id="content-wrapper">
    <div class="container-fluid">