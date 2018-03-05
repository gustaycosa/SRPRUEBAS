<?php

ini_set("soap.wsdl_cache_enabled", "0");

	$Columnas = array("Id_Cliente","Nombre","RFC");//COLUMNAS GRID

try{ 
    $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";

    $WS = new SoapClient($WebService);
    $result = $WS->MuestraClientes();
    $xml = $result->MuestraClientesResult->any;
    $obj = simplexml_load_string($xml);
    $Datos = $obj->NewDataSet->Table;
    
} catch(SoapFault $e){
  var_dump($e);
}

echo '<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar cliente</h4>
      </div>
      <div class="modal-body">';
echo "<table id='gridpop' class='table table-striped table-bordered table-condensed table-hover display compact'>
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
    echo "<tr class='Seleccionado' data-id='".$Datos[$i]->$Columnas[0]."' data-name='".$Datos[$i]->$Columnas[1]."'>";
    for($j=0; $j<count($Columnas); $j++){
        echo "<td class='text-center'>".$Datos[$i]->$Columnas[$j]."</td>";
    } 
    echo "</tr>";
 } 
    echo "</tbody></table>";
    echo '</div>
        </div>
      </div>
    </div>';

?>

            