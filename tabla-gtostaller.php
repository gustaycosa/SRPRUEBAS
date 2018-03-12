<?php

$Columnas = array("Id_ConceptoCtb","ConceptoCtb","Mes_Actual","Mes_Anterior","Variacion","Acumulado_ene","Prom_mensual","Ingresos_gen","Util_per_generada","Ano_Act","Ano_Ant","TF");
$titulos = array("Id","CONCEPTO CONTABLE","MES ACTUAL","MES ANTERIOR","VARIACION","ACUMULADO ENERO","PROMDERIO MENSUAL","INGRESOS GENERADOS","UTILIDAD/PERDIDA","AÑO ACTUAL","AÑO ANTERIOR","TF");

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
        $result = $WS->edogastostaller($parametros);
        $xml = $result->edogastostallerResult->any;
        //$result = $WS->edogastostaller($parametros);
        //$xml = $result->edogastostallerResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

    $r = "<div class='table-responsive'>
        <table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact nowrap' cellspacing='0' width='100%' style='white-space: nowrap;'><thead><tr>".
                "<th>".$titulos[0]."</th>".
                "<th>".$titulos[1]."</th>".
                "<th>".$titulos[2]."</th>".
                "<th>".$titulos[3]."</th>".
                "<th>".$titulos[4]."</th>".
                "<th>".$titulos[5]."</th>".
                "<th>".$titulos[6]."</th>".
                "<th>".$titulos[7]."</th>".
                "<th>".$titulos[8]."</th>".
                "<th>".$titulos[9]."</th>".
                "<th>".$titulos[10]."</th>".
                "<th>".$titulos[11]."</th>".
             "</tr></thead><tfoot><tr>".
                 "<th>".$titulos[0]."</th>".
                 "<th>".$titulos[1]."</th>".
                 "<th>".$titulos[2]."</th>".
                 "<th>".$titulos[3]."</th>".
                 "<th>".$titulos[4]."</th>".
                 "<th>".$titulos[5]."</th>".
                 "<th>".$titulos[6]."</th>".
                 "<th>".$titulos[7]."</th>".
                 "<th>".$titulos[8]."</th>".
                 "<th>".$titulos[9]."</th>".
                 "<th>".$titulos[10]."</th>".
                 "<th>".$titulos[11]."</th>".
             "</tr></tfoot><tbody>";

     for($i=0; $i<count($Datos); $i++){
         //$fila = $Datos[$i]->$Columnas[6];

       
         $fila = $Datos[$i]->$Columnas[11];

         $r = $r."<tr>";

         if($fila=="T1"){
            $r = $r."<td class='t1'>".$Datos[$i]->$Columnas[0]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[1]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[2]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[3]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[4]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[5]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[6]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[7]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[8]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[9]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[10]."</td>".
             "<td class='t1'>".$Datos[$i]->$Columnas[11]."</td>";
         }
         if($fila=="T2"){
             $r = $r."<td class='t2'>".$Datos[$i]->$Columnas[0]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[1]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[2]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[3]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[4]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[5]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[6]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[7]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[8]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[9]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[10]."</td>".
             "<td class='t2'>".$Datos[$i]->$Columnas[11]."</td>";
         }
         if($fila=="T3"){
             $r = $r."<td class='t3'>".$Datos[$i]->$Columnas[0]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[1]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[2]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[3]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[4]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[5]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[6]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[7]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[8]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[9]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[10]."</td>".
             "<td class='t3'>".$Datos[$i]->$Columnas[11]."</td>";
         }
         if($fila=="N"){
             $r = $r."<td>".$Datos[$i]->$Columnas[0]."</td>".
             "<td>".$Datos[$i]->$Columnas[1]."</td>".
             "<td>".$Datos[$i]->$Columnas[2]."</td>".
             "<td>".$Datos[$i]->$Columnas[4]."</td>".
             "<td>".$Datos[$i]->$Columnas[4]."</td>".
             "<td>".$Datos[$i]->$Columnas[5]."</td>".
             "<td>".$Datos[$i]->$Columnas[6]."</td>".
             "<td>".$Datos[$i]->$Columnas[7]."</td>".
             "<td>".$Datos[$i]->$Columnas[8]."</td>".
             "<td>".$Datos[$i]->$Columnas[9]."</td>".
             "<td>".$Datos[$i]->$Columnas[10]."</td>".
             "<td>".$Datos[$i]->$Columnas[11]."</td>";
         }
         $r = $r."</tr>";
     } 
        //$ConceptoDivision = $Datos[$i]->$Columnas[0]; 

      $r = $r."</tbody></table></div>";
      echo $r;
        //echo number_format($Suma, 2, ',', ' ');

?>

    <script type="text/javascript"> 
        
        <?php echo GrdRpt('Edo-GtosTaller_'.$Mes."-".$Ejercicio); ?>

    </script>