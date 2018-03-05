<?php

ini_set("soap.wsdl_cache_enabled", "0");

try{ 
    $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
    
    $id = $_POST["Data1"]; 
    $iId = (int) $id;
    //echo '<script language="JavaScript">alert("'.$iId.'");</script>';
    $empresa='TAYCOSA';
    $parametros = array();
    $parametros['sId_Empresa']=$empresa;
    $parametros['iId']=$iId;

    $WS = new SoapClient($WebService,$parametros);
    $result = $WS->UsuariosSelect($parametros);
    $xml = $result->UsuariosSelectResult->any;
    $obj = simplexml_load_string($xml);
    $Datos = $obj->NewDataSet->Table;
    //echo $xml;
    //var_dump($Datos);
    
} catch(SoapFault $e){
  var_dump($e);
}
//echo '<script type="text/javascript"  src="js/jquery.min.js"></script>';
echo '<script language="JavaScript">';
echo '$(document).ready(function() {';
    echo '$("#Controles").show();';
    echo '$("#txtUsuario").val("'.$Datos[0]->usuario.'");';
    echo '$("#txtContrasena").val("'.$Datos[0]->contraseña.'");';
    echo '$("#txtNombre").val("'.$Datos[0]->nombre.'");';
    echo '$("#txtCelular").val("'.$Datos[0]->telefono.'");';
    echo '$("#txtEmpresa").val("'.$empresa.'");';
    echo '$("#CmbGrupos").val("'.$Datos[0]->Id_Grupo.'");';
    echo '$("#Cmbperfiles").val("'.$Datos[0]->Id_Perfil.'");';
    echo '$("#txtCorreo").val("'.$Datos[0]->Correo.'");';
    echo '$("#txtContrasenaCorreo").val("'.$Datos[0]->PassCorreo.'");';
    echo '$("#txtUsuarioFUM").val("'.$Datos[0]->Empleado.'");';
echo '});';
echo '</script>';

/*
echo '<form id="ControlesModificar" class="form-horizontal" method="POST" name="ControlesModificar">
<div class="col-sm-6 form-group">
    <label for="exampleInputEmail1" class="col-sm-3 control-label">Usuario:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Ingrese su Usuario" value="'.$Datos[0]->usuario.'">
        </div>
    </div>';
echo '<div class="col-sm-6 form-group">
        <label for="exampleInputEmail1" class="col-sm-3 control-label">Nombre:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Ingrese su Nombre" value="'.$Datos[0]->nombre.'">
        </div>
    </div>';
echo '<div class="col-sm-6 form-group">
        <label for="exampleInputEmail1" class="col-sm-3 control-label">Celular:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="txtCelular" name="txtCelular" placeholder="Ingrese su Celular" value="'.$Datos[0]->telefono.'">
        </div>
    </div>';
echo '<div class="col-sm-6 form-group">
        <label for="exampleInputEmail1" class="col-sm-3 control-label">Empresa:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="txtEmpresa" name="txtEmpresa" placeholder="Ingrese su Empresa" value="'.$empresa.'">
        </div>
    </div>';
echo '<div class="col-sm-6 form-group">
        <label for="exampleInputEmail1" class="col-sm-3 control-label">Grupo:</label>
        <div class="col-sm-9">';
    echo CmbCualquierasMod('Id_Grupo','Grupo',"Grupos",$Datos[0]->Grupo,$Datos[0]->Id_Grupo); 
echo '</div></div>';
echo '<div class="col-sm-6 form-group">
        <label for="exampleInputEmail1" class="col-sm-3 control-label">Perfil:</label>
        <div class="col-sm-9">';
    echo CmbCualquierasMod('Id_Perfil','Perfil',"perfiles",$Datos[0]->Perfil,$Datos[0]->Id_Perfil); 
echo '</div></div>';
echo '<div class="col-sm-6 form-group">
        <label for="exampleInputEmail1" class="col-sm-3 control-label">Correo:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Ingrese su Correo" value="'.$Datos[0]->Correo.'">
        </div>
    </div>';
echo '<div class="col-sm-6 form-group">
        <label for="exampleInputEmail1" class="col-sm-3 control-label">UsuarioFUM:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="txtUsuarioFUM" name="txtUsuarioFUM" placeholder="Ingrese su UsuarioFUM" value="'.$Datos[0]->Empleado.'">
        </div>
    </div>';

echo '<div class="modal-footer">
  <button id="BtnCancel" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <input class="btn btn-default" type="submit" id="btnModificar" name="btnModificar" value="Enviar formulario" />
</div>
</form>';
*/
?>
