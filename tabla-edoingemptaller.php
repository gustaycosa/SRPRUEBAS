<?php

require_once('lib/nusoap.php');
include("Funciones.php"); 
ini_set("soap.wsdl_cache_enabled", "0");

$Columnas = array("Nombre","Fecha","Articulo","Descripcion","FacturaActual","cliente","TotalMOServicio");
$titulos = array("NOMBRE","FECHA","ARTICULO","DESCRIPCION","FACTURA ACTUAL","CLIENTE","SUBTOTAL");

$ConceptoDivision = '';
$Empresa = $_SESSION['Empresa'];
$Suma = 0;
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
        $result = $WS->edoimplementoemptaller($parametros);
        $xml = $result->edoimplementoemptallerResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

    echo "<div class='table-responsive'>
        <table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' ><thead><tr>"; 
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
         echo "<tr>";
             echo "<td>".$Datos[$i]->$Columnas[0]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[1]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[2]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[4]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[4]."</td>";
             echo "<td>".$Datos[$i]->$Columnas[5]."</td>"; 
             echo "<td>".$Datos[$i]->$Columnas[6]."</td>";
         echo "</tr>";
     } 

      echo "</tbody></table></div>";
      echo number_format($Suma, 2, ',', ' ');

?>

     <script type="text/javascript"> 
        
        <?php echo GrdRpt('Edo-IngTll_'.$Mes."-".$Ejercicio); ?>

    </script>