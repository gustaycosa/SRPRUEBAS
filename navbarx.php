      
<?php
echo "<div class='navmenu navmenu-default navmenu-fixed-left offcanvas'>
  <a class='navmenu-brand' href='#'>Reporteador</a>
  <ul class='nav navmenu-nav'>
        <li><a href='#' type='button' class='list-group-item'> Bienvenido</a></li> ";

require_once('lib/nusoap.php');
ini_set("soap.wsdl_cache_enabled", "0");
$Columnas = array("Forma","Descripcion");

try{ 
           
    $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
    //parametros de la llamada
    $parametros = array();
    $parametros['sUser'] = 'GHDEZ';

    $WS = new SoapClient($WebService, $parametros);
    $result = $WS->WebMenuCreator($parametros);
    $xml = $result->WebMenuCreatorResult->any;
    $obj = simplexml_load_string($xml);
    $Datos = $obj->NewDataSet->Table;

    else{}
} catch(SoapFault $e){
  var_dump($e);
}

     for($i=0; $i<count($Datos); $i++){
        echo "<li><a href='".$Datos[$i]->$Columnas[0].".php' type='button' class='list-group-item'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span>".$Datos[$i]->$Columnas[1]."</a></li>";
     } 

    echo "<li><a href='salir.php' type='button' class='list-group-item'><span class='glyphicon glyphicon-off' aria-hidden='true'></span> Cerrar sesión</a></li> 
  </ul>
</div>
<div class='navbar navbar-default navbar-fixed-top'>
  <button type='button' class='navbar-toggle' data-toggle='offcanvas' data-target='.navmenu' data-canvas='body' style=' background: #337ab7;'>
    <span class='icon-bar'></span>
    <span class='icon-bar'></span>
    <span class='icon-bar'></span>
  </button>
</div>";
?>