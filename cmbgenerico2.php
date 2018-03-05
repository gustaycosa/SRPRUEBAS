<?php

    $sWhere1=$_POST["Cmbmarcas"]; 
    $sWhere2=$_POST["CmbTipoMaquinaria"];
    /*
    if ($_POST["Cmbdeptos"]=0)
    {
        $sWhere1="";   
    }
    if ($_POST["Cmbdivisiones"]=0)
    {
        $sWhere2="";   
    }
*/
    //echo "<script>alert('".$sWhere1."---".$sWhere2."');</script>";

    try{ 
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada

        $parametros = array();
        $parametros['sWhere1'] = $sWhere1;
        $parametros['sWhere2'] = $sWhere2;
        //echo "<script>alert('".$parametros['sWhere1']."///".$parametros['sWhere2']."');</script>";
        //Invocación al web service
        $WS = new SoapClient($WebService,$parametros);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->CBO_ALM_MODELO($parametros);
        $xml = $result->CBO_ALM_MODELOResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;

    } catch(SoapFault $e){
      var_dump($e);
    }
    $Cmb = "<select id='CmbModelo' name='CmbModelo' class='col-sm-12 form-control'><option value='0'>TODO (".$sClave.")</option>"; 
     for($i=0; $i<count($Datos); $i++){
        $Cmb = $Cmb."<option value='".$Datos[$i]->C1."'>".$Datos[$i]->C2."</option>";
    }
    $Cmb = $Cmb."</select>";
    //return $Cmb;
    echo $Cmb;
?>