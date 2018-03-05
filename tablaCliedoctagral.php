<?php

require_once('lib/nusoap.php');
include("Funciones.php"); 
ini_set("soap.wsdl_cache_enabled", "0");

//COLUMNAS GRID
//$De = date('Y-m-d');
//$A = date('Y-m-d');
try{ 
    
    if ($_POST){
        
        $Empresa = $_POST["CmbEmpresa"];
        $A =  $_POST["Ffin"]; 
        $De = $_POST["Fini"];
        $Cliente =  $_POST["TxtCliente"]; 
        $Moneda =  $_POST["CmbMoneda"]; 

        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['sId_Empresa'] = $Empresa;
        $parametros['dtFechaIni'] = $De;
        $parametros['dtFechaFin'] = $A;
        $parametros['sId_Cliente'] = $Cliente;
        $parametros['sMoneda'] = $Moneda;
        //ini_set("soap.wsdl_cache_enabled", "0");
        //Invocación al web service
        $WS = new SoapClient($WebService, $parametros);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->Inf_Cli_EstadoCuentaGral($parametros);
        $xml = $result->Inf_Cli_EstadoCuentaGralResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

echo "<div class='table-responsive'>
	<table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' ></table>";

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
			$sWsNomb = 'cliedoctagral';
            $aColumnas = array("FECHA","CVE_DOCUMENTO","CARGO","ABONO","SALDOCLIENTE","CONCEPTO","REFERENCIA","FECHAVENCE","SALDODOCTO","SALDOMOVTO","DIASVENCE","SUBTOTAL","IMPIVA","DESCTO","TOTAL","CVEDOCTO","TIPODOCTO","FUM","ID_USUARIO");
            $aTitulos = array("FECHA","CVE_DOCUMENTO","CARGO","ABONO","SALDOCLIENTE","CONCEPTO","REFERENCIA","FECHAVENCE","SALDODOCTO","SALDOMOVTO","DIASVENCE","SUBTOTAL","IMPIVA","DESCTO","TOTAL","CVEDOCTO","TIPODOCTO","FUM","ID_USUARIO");
			echo GrdRptShort($sGridNomb,$sWsNomb,$aColumnas,$aTitulos);
		?>

    </script>
            
