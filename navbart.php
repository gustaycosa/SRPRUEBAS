<div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
  <a class="navmenu-brand" href="#">Reporteador</a>
  <ul class="nav navmenu-nav">
        <li><a href="#" type="button" class="list-group-item"> Bienvenido <?php echo $_SESSION["NombreUsuario"].' Empresa '.$_SESSION['Empresa']?></a></li> 
    <!--
    <li><a href="Gobernador.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
    -->
    <li>
        <a href="Existencias.php" type="button" class="list-group-item">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
            Existencias
        </a>
    </li>

    <li>
        <a href="Asistencias.php" type="button" class="list-group-item">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
            Asistencias
        </a>
    </li>
    <li>
        <a href="Usuarios.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
            Usuarios
        </a>
    </li>
    <li>
        <a href="cliedoctagral.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-euro" aria-hidden="true"></span> 
            Cliedocta
        </a>
    </li>
    <li>
        <a href="commecanicos.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 
            Comisiones mecanicos (TALLER)
        </a>
    </li>
    <li>
        <a href="commecanicosvtas.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 
            Comisiones mecanicos (VENTAS)
        </a>
    </li>
    <li>
        <a href="comvendedores.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
            Comisiones por vendedor
        </a>
    </li>
    <li>
        <a href="Vtasvendedores2.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
            Ventas por vendedor
        </a>
    </li>
    <li>
        <a href="vtasxmecanico2.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
            Ventas por mecanico
        </a>
    </li>
    <li>
        <a href="vtasserviciospreventivos2.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
            Servicios preventivos
        </a>
    </li>
    <li>
        <a href="ejercicios.php" type="button" class="list-group-item">
        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
            Almacen vs contabilidad
        </a>
    </li>
    <li><a href="salir.php" type="button" class="list-group-item"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar sesión</a></li> 
  </ul>
    
<!--
  <ul class="nav navmenu-nav">
    <li><a href="#">Link</a></li>
    <li><a href="#">Link</a></li>
    <li><a href="#">Link</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
      <ul class="dropdown-menu navmenu-nav">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li class="dropdown-header">Nav header</li>
        <li><a href="#">Separated link</a></li>
        <li><a href="#">One more separated link</a></li>
      </ul>
    </li>
  </ul>
-->
</div>

<div class="navbar navbar-default navbar-fixed-top">
  <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body" style=" background: #337ab7;">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>