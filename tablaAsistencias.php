<?php

require_once('lib/nusoap.php');

//ini_set("soap.wsdl_cache_enabled", "0");

$Columnas = array("USERID","NAME","FECHA","DIA","ENTRADA","SALIDA","ATT");//COLUMNAS GRID
//$De = date('Y-m-d');
//$A = date('Y-m-d');

try{ 
    
    if ($_POST){
        
        
        $Empresa = $_POST["CmbEmpresa"];
        $De = $_POST["Fini"];
        $A =  $_POST["Ffin"]; 
        $user =  $_POST["CmbATT_USERINFO"]; 

        $dDe = strtotime($De);
        $newformat1 = date('Y-m-d',$dDe);
        
        $dA = strtotime($A);
        $newformat2 = date('Y-m-d',$dA);
        
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['sId_Empresa'] = $Empresa;
        $parametros['De'] = $newformat1;
        $parametros['A'] = $newformat2;
        $parametros['iUserID'] = $user;

        //ini_set("soap.wsdl_cache_enabled", "0");
        //Invocación al web service
        $WS = new SoapClient($WebService, $parametros);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->ReporteAsistencias($parametros);
        $xml = $result->ReporteAsistenciasResult->any;

        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

echo "
	<table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' style='white-space: nowrap;'>
	 	<thead><tr>"; 
		
			for($i=0; $i<count($Columnas); $i++){
		  		echo "<th>".$Columnas[$i]."</th>";
			}

	  	echo "</tr></thead>
	 	<tfoot><tr>";

			for($i=0; $i<count($Columnas); $i++){
		  		echo "<th>".$Columnas[$i]."</th>";
			}
	  	
 echo "</tr></tfoot><tbody>";
    
 for($i=0; $i<count($Datos); $i++){
    echo "<tr>";
    for($j=0; $j<count($Columnas); $j++){
        echo "<td width='auto'>".$Datos[$i]->$Columnas[$j]."</td>";
    } 
    echo "</tr>";
 } 
    
  echo "</tbody></table>";

?>

<script type="text/javascript"> 
    
    $(document).ready(function() {
        
        <?php include("grid_full.php"); ?>
        
    });
</script>
            
