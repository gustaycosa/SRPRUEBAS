<?php

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
        <table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' ><thead><tr></tr></thead><tbody></tbody></table></div>";
	$arreglo = [];
	for($i=0; $i<count($Datos); $i++){
		$arreglo[$i]=$Datos[$i];
	}

?>

     <script type="text/javascript">  
        var datos = 
        <?php 
            echo json_encode($arreglo);
        ?>
		;
        <?php
			$sGridNomb = 'grid';
			$sWsNomb = 'ing_emp_taller';
            $aColumnas = array("Nombre","Fecha","Articulo","Descripcion","FacturaActual","cliente","TotalMOServicio");
            $aTitulos = array("NOMBRE","FECHA","ARTICULO","DESCRIPCION","FACTURA ACTUAL","CLIENTE","SUBTOTAL");
			echo GrdRpt($sGridNomb,$sWsNomb,$aColumnas,$aTitulos);
		?>

    </script>