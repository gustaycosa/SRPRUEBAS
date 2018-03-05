<form id="ControlesForm" class="form-horizontal" method="POST" name="formulario" style="display:none;">

<?php

  $CamposNvo = array("Usuario","Pass","Nombre","Celular","Empresa","Grupo","Perfil","Correo","PassCorreo","UsuarioFUM");//CAMPOS MODAL NUEVO
  $CamposNvoTipo = array("txt","txt","txt","txt","txt","txt","txt","txt","txt","txt");//CAMPOS MODAL TIPOS

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
<input type="text" class="form-control" id="IDrow" name="IDrow" placeholder="hideeee" style="/*display:none;*/">
<div class="modal-footer">
  <button id="BtnCancel" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <input class="btn btn-default" type="submit" id="" name="btnEnviar" value="Enviar formulario" />
</div>
</form>