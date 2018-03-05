
<!DOCTYPE html>

<html class="no-js">
  <?php include("head.php"); ?>

<body>
    
<?php include("menu.php"); ?>
<form id="frminicio" method="POST" class="form-inline">
  <h2>Reporte Asistencias</h2>
  <div class="form-group">
    <label for="inputFechaIni">De:</label>
    <input type="date"  name="Fini" id="Fini"  value="<?php echo date("Y-m-d");?>" class="form-control" placeholder="Rango Fecha Inicial"/>
  </div>
  <div class="form-group">
    <label for="inputFechaFin">A:</label>
    <input type="date" name="Ffin" id="Ffin" value="<?php echo date("Y-m-d");?>" class="form-control" placeholder="Rango Fecha Final" >
  </div>
  <button type="submit" class="btn btn-primary btn-sm" onMouseOver="style.cursor=cursor">Consultar</button>
</form>

<?php
try{

if ($_POST){

$De = $_POST["Fini"];
$A =  $_POST["Ffin"]; 


//$WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
//$WebService="http://192.168.1.1/WEB_SERVICES/DataLogs.asmx?wsdl";
include ("RutaWS.php");
//parametros de la llamada
$parametros = array();
$parametros['De'] = $De;
$parametros['A'] = $A;

ini_set("soap.wsdl_cache_enabled", "0");
//Invocación al web service
$WS = new SoapClient($WebService, $parametros);
//recibimos la respuesta dentro de un objeto
$result = $WS->ReporteAsistencias($parametros);
$xml = $result->ReporteAsistenciasResult->any;

 $obj = simplexml_load_string($xml);

$Datos = $obj->NewDataSet->Table;

 echo "<div  class='table-responsive col-sm-12'><table id='grid' class='table table-striped table-bordered table-condensed table-hover '><thead><tr><th>ID</th><th>NOMBRE</th><th>FECHA</th><th>DIA</th><th>ENTRADA</th><th>SALIDA</th><th>ATT</th></tr></thead>
 <tfoot><tr><th>ID</th><th>NOMBRE</th><th>FECHA</th><th>DIA</th><th>ENTRADA</th><th>SALIDA</th><th>ATT</th></tr></tfoot><tbody>";
 for($i=0; $i<count($Datos); $i++){
  
  if ($Datos[$i]->ENTRADA >'09:00:00')
  {
  echo "<tr class='danger'>";  
  }
  else
  {
    echo "<tr>";
  }
  echo  "<td class='text-center'>" . $Datos[$i]->USERID."</td>".
            "<td class='text-center'>".$Datos[$i]->NAME."</td>".
            "<td class='text-center'>".$Datos[$i]->FECHA."</td>".
            "<td class='text-center'>".$Datos[$i]->DIA."</td>".
            "<td class='text-center'>".$Datos[$i]->ENTRADA."</td>".
            "<td class='text-center'>".$Datos[$i]->SALIDA."</td>".
            "<td class='text-center'>".$Datos[$i]->ATT."</td>";
  echo "</tr>";
 } 
  echo "</tbody></table></div>";

}
} catch(SoapFault $e){
  var_dump($e);
}
?>

<?php include("script.php"); ?>

<script type="text/javascript"> 

    $(document).ready(function() {

     <?php include("grid_full.php"); ?>

    });

</script>



</body>

</html>