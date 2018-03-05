<?php
require_once('lib/nusoap.php');
include("Funciones.php"); 
ini_set("soap.wsdl_cache_enabled", "0");

$Columnas = array("Nombre","Saldo");
$titulos = array("NOMBRE DEUDOR","SALDO DEUDOR");

$ConceptoDivision = '';
$Empresa = $_SESSION['Empresa'];
$Suma = 0;
try{ 
    
    if ($_POST){
        
        $Ejercicio =  $_POST["TxtEjercicio"]; 
        $Mes =  $_POST["TxtMes"]; 
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        $parametros = array();
        $parametros['Empresa'] = 'TAYCOSA';
        $parametros['Mes'] = $Mes;
        $parametros['Ejercicio'] = $Ejercicio;
        $WS = new SoapClient($WebService,$parametros);
        $result = $WS->edorelaciondeudores($parametros);
        $xml = $result->edorelaciondeudoresResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

echo "<table id='griddeu' class='gridpop table table-striped table-bordered table-condensed table-hover display compact'>
	 	<thead><tr>"; 
    echo "<th>".$titulos[0]."</th>";
    echo "<th>".$titulos[1]."</th>";
    echo "</tr></thead><tfoot><tr>";
    echo "<th>".$titulos[0]."</th>";
    echo "<th>".$titulos[1]."</th>";
 echo "</tr></tfoot><tbody>";

 for($i=0; $i<count($Datos); $i++){
    echo "<tr class='Seleccionado' data-id='".$Datos[$i]->$Columnas[0]."' data-name='".$Datos[$i]->$Columnas[1]."'>";
    for($j=0; $j<count($Columnas); $j++){
        echo "<td class='text-center'>".$Datos[$i]->$Columnas[$j]."</td>";
    } 
    echo "</tr>";
 } 
    echo "</tbody></table>";

?>
<script type="text/javascript"> 

    <?php echo GrdPopD('AnaDeu'); ?>

</script>
            