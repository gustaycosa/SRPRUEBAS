<?php

require_once('lib/nusoap.php');
include("Funciones.php"); 
ini_set("soap.wsdl_cache_enabled", "0");
	
try{    
	//$clienteSOAP = new SoapClient('http://dwh.taycosa.mx/web_services/Datalogs.asmx?wsdl');
 $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
 $WS = new SoapClient($WebService);
// $clienteSOAP = new SoapClient('http://192.168.1.1/web_services/Datalogs.asmx?wsdl');
//ini_set("soap.wsdl_cache_enabled", "0");
 //$resultado = $clienteSOAP->MaquinariaVtaUsada();
 $result = $WS->MaquinariaVtaUsada();
 $xml = $result->MaquinariaVtaUsadaResult->any;
 $obj = simplexml_load_string($xml);

 $MqVtaUsada = $obj->NewDataSet->Table;
//var_dump($MqVtaUsada);
for($i=0;$i<count($MqVtaUsada);$i++) {
	//imagen png codificada en base64

	$cadenaWS = $MqVtaUsada[$i]->ImgFrontal;
	//$myText = (string)$myVar;
	//$Base64Img = "data:image/png;base64,". $cadenaWS;
	 
	//eliminamos data:image/png; y base64, de la cadena que tenemos
	//hay otras formas de hacerlo				   
	//list(, $Base64Img) = explode(';', $Base64Img);
	//list(, $Base64Img) = explode(',', $Base64Img);
	//Decodificamos $Base64Img codificada en base64.
	$cadenaWS = base64_decode($cadenaWS);
	//escribimos la información obtenida en un archivo llamado 
	//unodepiera.png para que se cree la imagen correctamente
	file_put_contents('unodepiera'.$i.'.png', $cadenaWS);

	echo '<a id="'.$MqVtaUsada[$i]->Id_Maquinaria.'" class="VincProd">';
	echo '<div class="img-rounded col-sm-12 col-xs-12 col-md-12 producto" style="background: url(unodepiera'.$i.'.png) center no-repeat;"></div>';
 
    echo '<div class="img-rounded col-sm-12"><label class="text-center" style="display:inline-block;">'.$MqVtaUsada[$i]->TipoMaquinaria.'-'.$MqVtaUsada[$i]->Marca.'-'.$MqVtaUsada[$i]->Modelo.'</label>';
    echo '</div></a>';

	} 

} catch(SoapFault $e){
  var_dump($e);
}

 ?>