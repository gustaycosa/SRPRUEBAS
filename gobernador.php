<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">
    
<?php include("Funciones.php"); ?>
<?php echo Cabecera('Existencias'); ?>
<?php
	$TituloPantalla = "Catalogo de usuarios";//TITULO EN PANTALLA
?>
<?php
	$Columnas = array("id", "usuario","Tipo","nombre","Perfil","grupo","telefono");//COLUMNAS GRID
	$CamposNvo = array("Usuario","Pass","Nombre","Celular","Empresa","Grupo","Perfil","Correo","PassCorreo","UsuarioFUM");//CAMPOS MODAL NUEVO
	$CamposNvoTipo = array("txt","txt","txt","txt","txt","txt","txt","txt","txt","txt");//CAMPOS MODAL TIPOS
    //$WSFucntion = "UsuariosSelect" ;
    $WSFucntion = "Usuarios" ;

?>
<body>

    <?php include("navbarv.php"); ?>
    <div class="panel panel-default"> 
    <div class="panel-heading"><h6><?php echo $TituloPantalla; /*Incluir modal nvo*/?></h6></div> 
    <div class="panel-body"> 		
        <?php $Columnas; /*Incluir modal nvo*/?>
        <form id="formulario" method="POST" class="form-horizontal">
          <!--<input type="submit" id="btnEnviar" class="btn btn-primary btn-sm col-sm-2" value="Consultar" onMouseOver="">-->
          <button id="BtnRefrescar" type="button" class="btn btn-sm btn-default" >
              <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
              Nuevo
          </button>
          <button type="button" class="btn btn-sm btn-default">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
              Modificar
          </button>
          <button id="BtnEliminar" type="button" class="btn btn-sm btn-default">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              Eliminar
          </button>
          <button id="BtnCerrar" type="button" class="btn btn-sm btn-default">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
              Cerrar
          </button>
        </form>
        <div class="controles">
            
        </div>	
        <div class="respuesta">
            
        </div>				
    </div>
    
	<?php $CamposNvo; /*Incluir modal nvo*/?>
	<?php $CamposNvoTipo; /*Incluir modal nvo*/?>

</body>


<?php include("script-gobernador.php"); ?>
<script type="text/javascript"> 

    $(document).ready(function() {

        <?php include("grid_full.php"); ?>
//form carga submit
/*
    $('#BtnRefrescar').click(function() {
        $.ajax({
           type: "POST",
           url: 'tabla.php',
           data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $(".respuesta").html(data); // Mostrar la respuestas del script PHP.
           }
            error: function(error) {
                console.log(error);
            }
        });
    });
*/
<?php 
    echo AjaxClic("#BtnRefrescar","NvoElemento.php","form",".controles"); 
    echo BorraTodo("#BtnCerrar",".controles");
    //echo AjaxClic("#btnEnviar","Gobernador.php","form",".controles"); 
?>
    /*    
    $("form").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
               type: "POST",
               url: 'tabla.php',
               data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $(".respuesta").html(data); // Mostrar la respuestas del script PHP.
               }
             });
        return false; // Evitar ejecutar el submit del formulario.
    });
      */  
});

    
</script>

</html>