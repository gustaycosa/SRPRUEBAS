	<!DOCTYPE html>
<html>
	<?php include("head-tayco.php"); ?>
<body class="">

<?php include("navbar.php"); ?>

<div class="container-fluid PanelColor AntiRL">

<div id="InxMarcas" class="col-sm-12 AntiRL">
	<div class="col-sm-12" style="color:#000;">
			<div class="col-sm-3">
				<?php include("promo.php"); ?> 
			</div>
			<div class="col-sm-9">
			    <div class="media-body">
				    <ul class="nav nav-pills"> 
				  		<li role="presentation"><a href="#">Productos</a></li> 
			  			<li role="presentation"><a href="#">Maquinaria Usada en Venta</a></li> 			  			
				  	</ul>
				  	<h3>Maquinaria usada</h3>
					<div class="text-left">
<?php 	
try{
	$clienteSOAP = new SoapClient('http://dwh.taycosa.mx/web_services/Datalogs.asmx?wsdl');
// $clienteSOAP = new SoapClient('http://192.168.1.1/web_services/Datalogs.asmx?wsdl');
//ini_set("soap.wsdl_cache_enabled", "0");
 $resultado = $clienteSOAP->MaquinariaVtaUsada();

 $xml = $resultado->MaquinariaVtaUsadaResult->any;
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

	echo '<a href="producto1.php?obj1='.$MqVtaUsada[$i]->Id_Maquinaria.'" class="VincProd">';
	echo '<div class="img-rounded col-sm-12 col-xs-12 col-md-12 producto" style="background: url(unodepiera'.$i.'.png) center no-repeat;"></div>'
 ?>
			<div class="img-rounded col-sm-12">
				<label class="text-center" style="display:inline-block;"> <?php echo $MqVtaUsada[$i]->TipoMaquinaria." ".$MqVtaUsada[$i]->Marca." ".$MqVtaUsada[$i]->Modelo;?></label>
			</div>
		</a>
	
 <?php 
	} 

} catch(SoapFault $e){
  var_dump($e);
}

 ?>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?> 

</body>

<?php include("script-tayco.php"); ?> 

<?php include("chat.php"); ?>

</html>