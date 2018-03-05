
<div class="container-fluid PanelColor AntiRL" style="border-top: solid 10px #fab32e;" class=" hidden-xs">

<div id="InxMarcas" class="col-sm-12 AntiRL hidden-xs" style="border-top: solid 10px #fab32e;">
	<div class="col-sm-12" style="color:#000;">
		<div class="col-sm-12">
		    <div class="media-body">
			  	<h3>Maquinaria usada en Venta</h3>
				<div class="text-left">
<?php 	
try{
	$clienteSOAP = new SoapClient('http://dwh.taycosa.mx/web_services/Datalogs.asmx?wsdl');

 $resultado = $clienteSOAP->MaquinariaVtaUsada();

 $xml = $resultado->MaquinariaVtaUsadaResult->any;
 $obj = simplexml_load_string($xml);

 $MqVtaUsada = $obj->NewDataSet->Table;
//var_dump($MqVtaUsada);
for($i=0;$i<count($MqVtaUsada);$i++) {
	//imagen png codificada en base64
	$cadenaWS = $MqVtaUsada[$i]->ImgFrontal;
	$cadenaWS = base64_decode($cadenaWS);
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

