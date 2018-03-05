<div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
  <a class="navmenu-brand" href="#">Reporteador</a>
  <ul class="nav navmenu-nav">
        <li><a href="#" type="button" class="list-group-item"> Bienvenido <?php echo $_SESSION["NombreUsuario"].' Empresa '.$_SESSION['Empresa']?></a></li> 
    <li>
        <a href="Existencias2.php" type="button" class="list-group-item">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
            Existencias
        </a>
    </li>
    <li><a href="salir.php" type="button" class="list-group-item"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar sesión</a></li> 
  </ul>
    
</div>

<div class="navbar navbar-default navbar-fixed-top">
  <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body" style=" background: #337ab7;">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>