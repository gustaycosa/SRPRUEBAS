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

        $WS = new SoapClient($WebService, $parametros);
        $result = $WS->edogastosadmon($parametros);
        $xml = $result->edogastosadmonResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

    echo "<div class='table-responsive'>
        <table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact nowrap' cellspacing='0' width='100%'></table></div>"; 

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

			$sGridNomb = '#grid';
			$sWsNomb = 'gancambiaria';
            $aColumnas = array("ConceptoCtb","Mes_Actual","Mes_Anterior","Variacion","Acumulado_ene","Prom_mensual","Ingresos_gen","Util_per_generada","Ano_Act","Ano_Ant");
            $aTitulos = array("CONCEPTO CONTABLE","MES ACTUAL","MES ANTERIOR","VARIACION","ACUMULADO ENERO","PROMDERIO MENSUAL","INGRESOS GENERADOS","UTILIDAD/PERDIDA","AÑO ACTUAL","AÑO ANTERIOR");
			echo GrdRptShort($sGridNomb,$sWsNomb,$aColumnas,$aTitulos);
		?>
        //FUNCION DE PLATILLOS MENUS
        $(function(){

            $('.T1').click(function() {                
                if ($('.N').css("display") != "none" ) {
                    $('.N').hide(); 
                }else{
                    $('.N').show(); 
                }
            });
        });
    </script>