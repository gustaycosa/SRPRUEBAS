<?php
echo "<script>alert('entro');</script>";
try{ 
    
    if ($_POST){
    
        $id =  $_POST["TxtClave"];
        $iId = (int)$id;
        echo "<script>alert('".$id."');</script>";
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['iId'] = $iId;
        //echo "<script>alert('".$parametros['sTelefono']."');</script>";
        $WS = new SoapClient($WebService);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->UsuariosDelete($parametros);
        $xml = $result->UsuariosDeleteResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
    }
    else{
        $id =  $_POST["TxtClave"];

        $id =  $_POST["TxtClave"];
        $iId = (int)$id;
        echo "<script>alert('".$id."');</script>";
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['iId'] = $iId;
        //echo "<script>alert('".$parametros['sTelefono']."');</script>";
        $WS = new SoapClient($WebService);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->UsuariosDelete($parametros);
        $xml = $result->UsuariosDeleteResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
    }
} catch(SoapFault $e){
  var_dump($e);
}


?>