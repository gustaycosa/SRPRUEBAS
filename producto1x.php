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
			  			<li role="presentation"><a href="productos.php">Maquinaria Usada</a></li> 			  			
			  			<li role="presentation"><a href="#">CASE 275 DT DUAL</a></li> 
				  	</ul>
					<div class="text-center">
						
					<?php 	
						try{
						//$VarID = $HTTP_GET_VARS["obj"];
						$VarID = urldecode ($_GET["obj1"]);
						echo "'".$VarID."'";
						/*
						$clienteSOAP = new SoapClient('http://dwh.taycosa.mx/web_services/Datalogs.asmx?wsdl');
						//$clienteSOAP = new SoapClient('http://192.168.1.1/web_services/Datalogs.asmx?wsdl');
						//ini_set("soap.wsdl_cache_enabled", "0");
						$parametros = array();

						$parametros['Id_Maq'] = $VarID;

						$WS = new SoapClient($WebService, $parametros);

						$resultado = $$WS->MaquinariaVtaDetalle($parametros);

						$xml = $resultado->MaquinariaVtaDetalleResult->any;
						$obj = simplexml_load_string($xml);

						$MqVtaUsada = $obj->NewDataSet->Table;
							//imagen png codificada en base64
							$cadenaWS = $MqVtaUsada[0]->ImgFrontal;

							$Base64Img = base64_decode($cadenaWS);

							file_put_contents('unodepiera.png', $Base64Img);
*/
						} catch(SoapFault $e){
						  var_dump($e);
						}
					?>

						<div class="col-sm-3">
							<a class="group1 img-rounded" href="unodepiera.png" title="CASE 275 DT DUAL" style="background: url('unodepiera.png') center no-repeat;background-size: cover;width: 100%;height: 200px; display:inline-block;"></a>
							<br><br>
							<a href="pdf/CASE 275 DT DUAL.pdf" class="btn btn-primary" download="Tayco-CASE275DTDUAL.pdf">Descargar detalle</a>
						</div>
					</div>
					<?php $VariableCto='azul';  ?> 
					<?php include("contacto.php"); ?> 
			    </div>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?> 

</body>

<?php include("script-tayco.php"); ?> 

<script type="text/javascript">
    $(document).ready(function() {
		$(".group1").colorbox({rel:'group1'});

		var Nombre = new LiveValidation('Nombre');
		Nombre.add( Validate.Presence );
		Nombre.add( Validate.Length, { minimum: 10, maximum: 60 } );

		var Telefono = new LiveValidation('Telefono');
		Telefono.add( Validate.Presence );
		Telefono.add( Validate.Numericality );
		Telefono.add( Validate.Numericality, { onlyInteger: true } );
		Telefono.add( Validate.Length, { minimum: 10, maximum: 60 } );

		var Email = new LiveValidation('Email');
		Email.add( Validate.Presence );
		Email.add( Validate.Email );
		Email.add( Validate.Length, { minimum: 10, maximum: 35 } );

		var Mensaje = new LiveValidation('Mensaje');
		Mensaje.add( Validate.Presence );
		Mensaje.add( Validate.Length, { minimum: 10, maximum: 300 } );
	});
</script>



</html>

</form>