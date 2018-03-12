<?php

$Columnas = array("Id_Concepto","Tipo","Sucursal","Fecha","Concepto","Debe","Haber","Total","TF");
$titulos = array("Id_Concepto","Tipo","Sucursal","Fecha","Concepto","Debe","Haber","Total","TF");

try{ 
    
    if ($_POST){
        
        $Ejercicio =  $_POST["TxtEjercicio"]; 
        $Mes =  $_POST["TxtMes"]; 
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['Empresa'] = 'TAYCOSA';
        $parametros['Mes'] = $Mes;
        $parametros['Ejercicio'] = $Ejercicio;
        //ini_set("soap.wsdl_cache_enabled", "0");
        //Invocación al web service
        $WS = new SoapClient($WebService, $parametros);
        //recibimos la respuesta dentro de un objeto
        //$result = $WS->Edoresultados($parametros);
        //$xml = $result->EdoresultadosResult->any;
        $result = $WS->edofletes($parametros);
        $xml = $result->edofletesResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

    echo "<div class='table-responsive'>
        <table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact nowrap' cellspacing='0' width='100%' style='white-space: nowrap;'><thead><tr>"; 

                echo "<th>".$titulos[0]."</th>";
                echo "<th>".$titulos[1]."</th>";
                echo "<th>".$titulos[2]."</th>";
                echo "<th>".$titulos[3]."</th>";
                echo "<th>".$titulos[4]."</th>";
                echo "<th>".$titulos[5]."</th>";
                echo "<th>".$titulos[6]."</th>";
            echo "</tr></thead><tfoot><tr>";
                echo "<th>".$titulos[0]."</th>";
                echo "<th>".$titulos[1]."</th>";
                echo "<th>".$titulos[2]."</th>";
                echo "<th>".$titulos[3]."</th>";
                echo "<th>".$titulos[4]."</th>";
                echo "<th>".$titulos[5]."</th>";
                echo "<th>".$titulos[6]."</th>";
            echo "</tr></tfoot><tbody>";

     for($i=0; $i<count($Datos); $i++){
         //$fila = $Datos[$i]->$Columnas[6];

         echo "<tr>";
         /*
         for($j=0; $j<count($Columnas); $j++){
             echo "<td>".$Datos[$i]->$Columnas[$j]."</td>";
         }
         */
             //echo "<td>".$Datos[$i]->$Columnas[0]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[1]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[2]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[4]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[4]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[5]."</td>"; 
             echo "<td>".$Datos[$i]->$Columnas[6]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[7]."</td>";

             //echo "<td>".$Datos[$i]->$Columnas[12]."</td>";
         
         echo "</tr>";
     } 

      echo "</tbody></table></div>";
        //echo number_format($Suma, 2, ',', ' ');

?>

    <script type="text/javascript"> 
        
        <?php echo GrdRpt('Edo-Fletes_'.$Mes."-".$Ejercicio); ?>

    </script>