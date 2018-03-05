<?php 	


    try{
        if ($_POST){
            $VarID =  $_POST["TxtClave"]; 
            $WebService = 'http://dwh.taycosa.mx/web_services/Datalogs.asmx?wsdl';
            $parametros = array();
            $parametros['Id_Maq'] = $VarID;
            $WS = new SoapClient($WebService, $parametros);
            $resultado = $WS->MaquinariaParaVtaDetalle($parametros);
            $xml = $resultado->MaquinariaParaVtaDetalleResult->any;
            $obj = simplexml_load_string($xml);
            $MqVtaUsada = $obj->NewDataSet->Table;
            //imagen png codificada en base64
            $cadenaWS = $MqVtaUsada[0]->ImgFrontal;
            //$myText = (string)$myVar;
            //$Base64Img = "data:image/png;base64,". $cadenaWS;
            //eliminamos data:image/png; y base64, de la cadena que tenemos
            //hay otras formas de hacerlo				   
            //list(, $Base64Img) = explode(';', $Base64Img);
            //list(, $Base64Img) = explode(',', $Base64Img);
            //Decodificamos $Base64Img codificada en base64.
            $Base64Img = base64_decode($cadenaWS);
            //escribimos la información obtenida en un archivo llamado 
            //unodepiera.png para que se cree la imagen correctamente
            file_put_contents('xxx.jpg', $Base64Img);

            $VarMaquinaDesc = $MqVtaUsada[0]->TipoMaquinaria." ".$MqVtaUsada[0]->Marca." ".$MqVtaUsada[0]->Modelo;
        }

    } catch(SoapFault $e){
      var_dump($e);
    }
?>
<h3><?php echo $VarMaquinaDesc;?></h3><p>
<!--<a class="group1" href="img/back1.jpg" title="Me and my grandfather on the Ohoopee.">Grouped Photo 1</a></p>-->

<div class='table-responsive'>
    <a target="_blank" class="group1 img-rounded" href="xxx.jpg" title="CASE 275 DT DUAL" style="background: url('xxx.jpg') center no-repeat;background-size: contain;width: 100%;height: 300px; display:block;"></a>
</div>

