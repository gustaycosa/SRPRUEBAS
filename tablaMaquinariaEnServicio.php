<?php

require_once('lib/nusoap.php');

ini_set("soap.wsdl_cache_enabled", "0");

//$De = date('Y-m-d');
//$A = date('Y-m-d');

try{ 
    $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
    //parametros de la llamada
    $parametros = array();
    $parametros['iId_Empresa'] = 1;

    //Invocación al web service
    $WS = new SoapClient($WebService,$parametros);
    //recibimos la respuesta dentro de un objeto
    //$result = $WS->$WSFucntion();
    $result = $WS->Rpt_Maquinaria_Servicio($parametros);
    $xml = $result->Rpt_Maquinaria_ServicioResult->any;
    $obj = simplexml_load_string($xml);
    $Datos = $obj->NewDataSet->Table;

    
} catch(SoapFault $e){
  var_dump($e);
}

echo "<div class='table-responsive col-sm-12'>
	<table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact'>
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
        echo "<td class='text-center'>".$Datos[$i]->$Columnas[$j]."</td>";
    } 
    echo "</tr>";
 } 
    
  echo "</tbody></table></div>";


?>
            
