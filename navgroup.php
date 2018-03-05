<style>
html, body {
    font-family: Arial, Helvetica, sans-serif;
}

/* define a fixed width for the entire menu */
.navigation {
  width: 300px;
}

/* reset our lists to remove bullet points and padding */
.mainmenu, .submenu {
  list-style: none;
  padding: 0;
  margin: 0;
}

/* make ALL links (main and submenu) have padding and background color */
.mainmenu a {
  display: block;
  background-color: #CCC;
  text-decoration: none;
  padding: 10px;
  color: #000;
}

/* add hover behaviour */
.mainmenu a:hover {
    background-color: #C5C5C5;
}


/* when hovering over a .mainmenu item,
  display the submenu inside it.
  we're changing the submenu's max-height from 0 to 200px;
*/

.mainmenu li:hover .submenu {
  display: block;
  max-height: 100%;
}

/*
  we now overwrite the background-color for .submenu links only.
  CSS reads down the page, so code at the bottom will overwrite the code at the top.
*/

.submenu a {
  background-color: #999;
}

/* hover behaviour for links inside .submenu */
.submenu a:hover {
  background-color: #666;
}

/* this is the initial state of all submenus.
  we set it to max-height: 0, and hide the overflowed content.
*/
.submenu {
  overflow: hidden;
  max-height: 0;
  -webkit-transition: all 0.5s ease-out;
}
</style>

<div class="navmenu navmenu-default navmenu-fixed-left offcanvas navigation">
  <ul class="mainmenu">
    <li><a href="">Reportes ventas</a></li>
    <li><a href="">Reportes Administrativos</a></li>
    <li><a href="">Estado de resultados</a>
      <ul class="submenu">
        <li>
            <a href="edoresutados.php" id="edoresultados" target="edoresultados" type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                01. Edoresultados
            </a>
        </li>
        <li>
            <a href="edoventas.php"  id="edoventas" target="edoventas"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                03. Ventas
            </a>
        </li>
        <li>
            <a href="edoingxservicio.php"  id="edoingxservicio" target="edoingxservicio"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                04. Ingresos por servicios
            </a>
        </li>
        <li>
            <a href="edogtostaller.php"  id="edogtostaller" target="edogtostaller"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                05. Gastos taller
            </a>
        </li>
        <li>
            <a href="edoingemptaller.php"  id="edoingemptaller" target="edoingemptaller"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                06. Implemento emp. taller
            </a>
        </li>
        <li>
            <a href="edogastosventas.php"  id="edogastosventas" target="edogastosventas"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                07. Gastos ventas
            </a>
        </li>
        <li>
            <a href="edoingempventas.php"  id="edoingempventas" target="edoingempventas"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                08. Implemento emp. ventas
            </a>
        </li>
        <li>
            <a href="edofletes.php"  id="edofletes" target="edofletes"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                09. Fletes
            </a>
        </li>
        <li>
            <a href="edogtosadmon.php"  id="edogtosadmon" target="edogtosadmon"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                10. Gastos admon.
            </a>
        </li>
        <li>
            <a href="edonomina.php"  id="edonomina" target="edonomina"  type="button" class="list-group-item" style="color:orangered;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                11. Nomina
            </a>
        </li>
        <li>
            <a href="edobalgral.php"  id="edobalgral" target="edobalgral"  type="button" class="list-group-item" style="color:orangered;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                12. Balance general
            </a>
        </li>
        <li>
            <a href="edorelancli.php"  id="edorelancli" target="edorelancli"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                13. Relacion analitica de clientes
            </a>
        </li>
        <li>
            <a href="edorelandeu.php"  id="edorelandeu" target="edorelandeu"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                14. Relacion analitica de deudores diversos
            </a>
        </li>
        <li>
            <a href="edorelanalm.php"  id="edorelanalm" target="edorelanalm"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                15. Relacion analitica de almacen
            </a>
        </li>
        <li>
            <a href="edorelanpro.php"  id="edorelanpro" target="edorelanpro"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                16. Relacion analitica de proveedores
            </a>
        </li>
        <li>
            <a href="edorelanacr.php"  id="edorelanacr" target="edorelanacr"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                17. Relacion analitica de acreedores diversos
            </a>
        </li>
        <li>
            <a href="edorelanancli.php"  id="edorelanancli" target="edorelanancli"  type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                18. Relacion analitica de anticipos de clientes
            </a>
        </li>
        <li>
            <a href="edoflujos.php"  id="edoflujos" target="edoflujos" type="button" class="list-group-item" style="color:green;" >
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                19. Estado de flujo de efectivo
            </a>
        </li>
        <li>
            <a href="edomaqconsig.php" id="edoflujos" target="edoflujos" type="button" class="list-group-item" style="color:green;">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                21. Relacion analitica de mercancia en consignacion
            </a>
        </li>
      </ul>
    </li>
    <li>
        <a href="salir.php"  id="edo" target="edo"  type="button" class="list-group-item"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar sesión</a>
    </li> 
  </ul>

</div>

<div class="navbar navbar-default navbar-fixed-top">
  <button  id="edo" target="edo"  type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body" style=" background: #337ab7;">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>