  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Nuevo elemento</h4>
        </div>
        <div class="modal-body">

            <form id="contact-form" class="form-horizontal" action="Gobernador.php" method="post" name="formulario">

            <?php
              for($i=0; $i<count($CamposNvo); $i++)
              {
                  echo '<div class="col-sm-6 form-group">';
                    echo '<label for="exampleInputEmail1" class="col-sm-3 control-label">'. $CamposNvo[$i] .':</label>';
                        echo '<div class="col-sm-9">';
                        //TIPO DEL ELEMENTO
                        switch ($CamposNvoTipo[$i]) {
                            case "txt":
                                echo '<input type="text" class="form-control" id="'. $CamposNvoTipo[$i] . $CamposNvo[$i] .'" name="'. $CamposNvoTipo[$i] . $CamposNvo[$i] . '" placeholder="Ingrese su '. $CamposNvo[$i] .'">';
                                break;
                            case "cmb":
                                echo '<select type="text" class="form-control" id="'. $CamposNvoTipo[$i] . $CamposNvo[$i] .'" name="'. $CamposNvoTipo[$i] . $CamposNvo[$i] .'" placeholder="Seleccione su '. $CamposNvo[$i] .'">'. $CamposNvo[$i] .'</select>';
                                break;
                            case "ckb":
                                echo '<select type="text" class="form-control" id="'. $CamposNvoTipo[$i] . $CamposNvo[$i] .'" name="'. $CamposNvoTipo[$i] . $CamposNvo[$i] .'" placeholder="Seleccione su '. $CamposNvo[$i] .'">'. $CamposNvo[$i] .'</select>';
                                break;
                        }
                      echo '</div>';
                  echo '</div>';
              }
            ?> 
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <input class="btn btn-default" type="submit" id="btnEnviar" name="btnEnviar" value="Enviar formulario" />
            </div>
            </form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <p class="respuesta">
        <?php
        if ($_POST){
            
            ini_set("soap.wsdl_cache_enabled", "0");
            
            $CamposNvo = array("Usuario","Pass","Nombre","Celular","Empresa","Grupo","Perfil","Correo","PassCorreo","UsuarioF");
            
            $Usuario = $_POST["txtUsuario"];
            $Pass = $_POST["txtPass"];
            $Nombre = $_POST["txtNombre"];
            $Celular = $_POST["txtCelular"];
            $Empresa = $_POST["txtEmpresa"];
            $Grupo = $_POST["txtGrupo"];
            $Perfil = $_POST["txtPerfil"];
            $Correo = $_POST["txtCorreo"];
            $PassCorreo = $_POST["txtPassCorreo"];
            $UsuarioF = $_POST["txtUsuarioFUM"];
            
            require_once('lib/nusoap.php');

            try{ 

                $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
                //parametros de la llamada
                $parametros = array();
                $parametros['Usuario'] = $Usuario;
                $parametros['Pass'] = $Pass;
                $parametros['Nombre'] = $Nombre;
                $parametros['Celular'] = $Celular;
                $parametros['Empresa'] = $Empresa;
                $parametros['Grupo'] = $Grupo;
                $parametros['Perfil'] = $Perfil;
                $parametros['Correo'] = $Correo;
                $parametros['PassCorreo'] = $PassCorreo;
                $parametros['UsuarioF'] = $UsuarioF;
                //
                //Invocación al web service
                $WS = new SoapClient($WebService,$parametros);
                $result = $WS->UsuariosInsert($parametros);
                $Datos = $result->UsuariosInsertResult->string;
                
                var_dump($result);

                $valido = $Datos ;

                 if ($valido=='0') {
                  echo '<script language="JavaScript"> alert("Usuario no insertado.");
                  </script>';

                  echo $valido;
                 }
                 else
                 {
                  echo '<script language="JavaScript"> alert("Usuario insertado.");
                  </script>';
                    ini_set("soap.wsdl_cache_enabled", "0");
                 }
                //$obj = simplexml_load_string($xml);
                //$Datos = $obj->NewDataSet->Table;

                //echo "<script language='JavaScript'> alert('El registro se inserto correctamente! '); </script>";

            } catch(SoapFault $e){
                var_dump($e);
            }
        }
            
        ?>


