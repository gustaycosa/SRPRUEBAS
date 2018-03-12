<?php

$Columnas = array("Id_ReporteContable","ReporteContable","ConceptoCtb","FEB_2017","MAR_2017","ABR_2017","MAY_2017","JUN_2017","JUL_2017");

$Titulos = array("CUENTA","FECHA","POLIZA","CONCEPTO","IMPORTE");

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
        $result = $WS->edogananciacambiaria($parametros);
        $xml = $result->edogananciacambiariaResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

    echo "<div class='table-responsive'>
        <table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' >></table></div>";
/*
        <thead><tr>"; 
            for($i=0; $i<count($Titulos); $i++){
                echo "<th>".$Titulos[$i]."</th>";
            }
            echo "</tr></thead><tfoot><tr>";
            for($i=0; $i<count($Titulos); $i++){
                echo "<th>".$Titulos[$i]."</th>";
            }
            echo "</tr></tfoot><tbody>";

     for($i=0; $i<count($Datos); $i++){
            echo "<tr>";
                echo "<td>".$Columnas[2]."</td>";
                echo "<td>".$Columnas[3]."</td>";
                echo "<td>".$Columnas[3]."</td>";
                echo "<td>".$Columnas[3]."</td>";
                echo "<td>".$Columnas[3]."</td>";
         
            echo "</tr>";
         /*
        if($i==0){
            echo "<tr><td><H4>".$Datos[$i]->$Columnas[1]."</H4></td><td></td><td></td><td></td><td></td></tr>";
            $ConceptoDivision = $bandera;
        }else if($bandera¡==$ConceptoDivision){
            echo "<tr><td></td><td>TOTAL</td><td><H4>".$Datos[$i]->$Columnas[$j]."</H4></td></tr>";
            echo "<tr><td><H4>".$Datos[$i]->$Columnas[1]."</H4></td><td></td><td></td></tr>";
            $ConceptoDivision = $bandera;
        } else{
            echo "<tr>";
            $Valor1 = number_format($Datos[$i]->$Columnas[7], 2, ',', ' ');
            echo "<td>".$Datos[$i]->$Columnas[2]."</td><td class='text-right'>".$Datos[$i]->$Columnas[7]."</td><td></td>";
            $Valor2 = $Datos[$i]->$Columnas[7] + $Datos[$i]->$Columnas[6];
            $Suma = $Suma + $Datos[$i]->$Columnas[6];
            echo "<td class='text-right'>".number_format($Valor2, 2, ',', ' ')."</td><td></td>";
            echo "</tr>";
            $ConceptoDivision = $bandera;
        }
         */
        

$arreglo = [];
for($i=0; $i<count($Datos); $i++){
    $arreglo[$i]=$Datos[$i];
}
        //print_r($arreglo);
        //echo number_format($Suma, 2, ',', ' ');

?>

    <script type="text/javascript"> 
        var datos = 
        <?php 
            echo json_encode($arreglo);
        ?>
        ;
		<?php

			$sGridNomb = '#grid';
			$sWsNomb = 'gancambiaria';
            $aColumnas = array("Tipo","Sucursal","Fecha","Concepto","Debe","Haber","Total","TF");
            $aTitulos = array("Tipo","Sucursal","Fecha","Concepto","Debe","Haber","Total","TF");
			echo GrdRptShort($sGridNomb,$sWsNomb,$aColumnas,$aTitulos);
		?>

    </script>