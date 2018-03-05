<?php

require_once('lib/nusoap.php');

ini_set("soap.wsdl_cache_enabled", "0");

$Columnas = array("id_maquinaria","Serie","TipoMaquinaria","CodigoAlmacen","COSTOCOMPRA","COSTOACONDICIONAMIENTO","HR_MO","FACTURA","Existencia","Marca","Modelo","Comentarios","FechaAlta","Usuario");

try{ 
    
    if ($_POST){
        /*
        $Id_Maquinaria = $_POST["TxtIdMaquinaria"];
        $Marca =  $_POST["CmbMarcas"]; 
        $Modelo = $_POST["CmbModelos"];
        $Tipo =  $_POST["CmbTipo"]; 
        */
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        /*
        $parametros = array();
        $parametros['iId_Maquinaria'] = $Id_Maquinaria;
        $parametros['iMarca'] = $Marca;
        $parametros['iModelo'] = $Modelo;
        $parametros['iTipo'] = $Tipo;
        */
        //ini_set("soap.wsdl_cache_enabled", "0");
        //Invocación al web service
        $WS = new SoapClient($WebService);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->MAquinariaPSelect();
        $xml = $result->MAquinariaPSelectResult->any;

        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

echo "<div class='table-responsive'>
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
        
        if($j==5){
            echo "<td width='auto'><a class='Clikeado' data-id='".$Datos[$i]->$Columnas[0]."' data-toggle='modal' data-target='#Mdl_Acond'>".$Datos[$i]->$Columnas[$j]."</a></td>";
        } else if($j==6){
            echo "<td width='auto'><a class='Clikeado' data-id='".$Datos[$i]->$Columnas[0]."' data-toggle='modal' data-target='#Mdl_Acond'>".$Datos[$i]->$Columnas[$j]."</a></td>";
        } else if($j==7){
            echo "<td width='auto'><a class='Clikeado' data-id='".$Datos[$i]->$Columnas[0]."' data-toggle='modal' data-target='#Mdl_Acond'>".$Datos[$i]->$Columnas[$j]."</a></td>";
        } else{
            echo "<td width='auto'>".$Datos[$i]->$Columnas[$j]."</td>";
        }
        
    } 
    echo "</tr>";
 } 
    
  echo "</tbody></table></div>";

?>

<script type="text/javascript"> 
        
    <?php include("grid_full.php"); ?>

</script>
            
