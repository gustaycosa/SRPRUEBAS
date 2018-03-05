<?php
include("Funciones.php");

ini_set("soap.wsdl_cache_enabled", "0");
	$Columnas = array("ID_SUCURSAL", "ARANCEL","NOMBRE","CODIGO","DIVISION","DEPTO","FAMILIA","EXISTENCIA","PRECIOVENTA");//COLUMNAS GRID

//$De = date('Y-m-d');
//$A = date('Y-m-d');

try{ 
    
    if ($_POST){

        $Empresa = "TAYCOSA";
        $Division = $_POST["Cmbdivisiones"]; 
        $Depto = $_POST["Cmbdeptos"];
        $Familia = $_POST["Cmbfamilia"];
        $Filtro = $_POST["Txtfiltro"];

        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['sId_Empresa'] = $Empresa;
        $parametros['sDivision'] = $Division;
        $parametros['sDepto'] = $Depto;
        $parametros['sFamilia'] = $Familia;
        $parametros['sText'] = $Filtro;
        
        //echo "<script>alert('".$parametros['sDivision']."---".$parametros['sDepto']."---".$parametros['sFamilia']."---".$parametros['sText']."');</script>";
        //Invocación al web service
        $WS = new SoapClient($WebService,$parametros);
        $result = $WS->ExistenciasSelect($parametros);
        $xml = $result->ExistenciasSelectResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}


    echo "<table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' style='white-space: nowrap;'><thead><tr>"; 

        for($i=0; $i<count($Columnas); $i++){
            echo "<th>".$Columnas[$i]."</th>";
        }

    echo "</tr></thead><tfoot><tr>";

        for($i=0; $i<count($Columnas); $i++){
            echo "<th>".$Columnas[$i]."</th>";
        }

    echo "</tr></tfoot><tbody>";

    if (count($Datos)>0){
         for($i=0; $i<count($Datos); $i++){
            echo "<tr>";
            for($j=0; $j<count($Columnas); $j++){
                echo "<td width='auto'>".$Datos[$i]->$Columnas[$j]."</td>";
            } 
            echo "</tr>";    
        }
    }
    else{
        //echo "<tr class='odd'><td valign='top' colspan='".count($Columnas)."' class='dataTables_empty'>No se encontraron resultados</td></tr>";
            echo "<tr>";
            for($j=0; $j<count($Columnas); $j++){
                echo "<td width='auto'> </td>";
            } 
            echo "</tr>";    
    }

    echo "</tbody></table>";  
?>

<script type="text/javascript"> 
    
    $(document).ready(function() {
        
        <?php include("grid_combo.php"); ?>
        
    });
</script>
            
