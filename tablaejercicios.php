<?php

require_once('lib/nusoap.php');

ini_set("soap.wsdl_cache_enabled", "0");

$Columnas = array("DIVISION","DEPTO","FAMILIA","DESCRIPCION","SALDO_INI_ALMACEN","TOTAL_ENTRADAS","TOTAL_SALIDAS","SALDO_INI_CONTA","DEBE","HABER","SALDO_FIN_CONTA","DIFERENCIA");

$ColumnasDet = array("DIVISION","DEPTO","FAMILIA","DESCRIPCION","SALDO_INI_ALMACEN","E_RECPED","E_TREC_PEDIDOTALLER","E_TREC_REFACCIONES","E_ACOND","E_CANC","E_DEVOLUCION","E_FACTURA","E_GARANTIA","E_DEVPRO","S_DEVOLUCION","S_FACTURA","S_GARANTIA","S_TENV_PEDIDOTALLER","S_TENV_REFACCIONES","TOTAL_ENTRADAS","TOTAL_SALIDAS","SALDO_INI_CONTA","DEBE","HABER");
//$De = date('Y-m-d');
//$A = date('Y-m-d');
try{ 
    
    if ($_POST){
        
        $Empresa = $_POST["CmbEmpresa"];
        $Sucursal = $_POST["Cmbsucursales"];
        $Ejercicio =  $_POST["TxtEjercicio"]; 
        $Mes =  $_POST["TxtMes"]; 
        $Detalle =  $_POST["TxtDetalle"]; 

        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['sId_Empresa'] = $Empresa;
        $parametros['sId_Sucursal'] = $Sucursal;
        $parametros['sEjercicio'] = $Ejercicio;
        $parametros['sMes'] = $Mes;
        //ini_set("soap.wsdl_cache_enabled", "0");
        //Invocación al web service
        $WS = new SoapClient($WebService, $parametros);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->SP_COMPULSA_ALM_CONTA_A($parametros);
        $xml = $result->SP_COMPULSA_ALM_CONTA_AResult->any;
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
            if($j==4 || $j==5 || $j==6){
                echo "<td class='warning' width='auto'>".$Datos[$i]->$Columnas[$j]."</td>";
            }else if($j==7 || $j==8 || $j==9){
                echo "<td class='danger' width='auto'>".$Datos[$i]->$Columnas[$j]."</td>";
            }
            else{
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
            
