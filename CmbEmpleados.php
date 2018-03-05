<?php
require_once('lib/nusoap.php');
ini_set("soap.wsdl_cache_enabled", "0");

try{ 
    $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
    //Invocación al web service
    $WS = new SoapClient($WebService);
    //recibimos la respuesta dentro de un objeto
    $result = $WS->CmbEmpleadosSelect();
    $xml = $result->CmbEmpleadosSelectResult->any;
    $obj = simplexml_load_string($xml);
    $Datos = $obj->NewDataSet->Table;
} catch(SoapFault $e){
  var_dump($e);
}

echo "<select  id='CmbEmpleados' name='CmbEmpleados' class='form-control'><option value='Selecciona'>Selecciona</option>"; 
    
 for($i=0; $i<count($Datos); $i++){
    echo "<option value='".$Datos[$i]->USERID."'>".$Datos[$i]->NAME."</option>";
 }

echo "</select>";
?>