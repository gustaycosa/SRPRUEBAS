<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">
    
<?php include("Funciones.php"); ?>
<?php echo Cabecera(); ?>
    
<?php
	$TituloPantalla = "Reporte de Existencias";//TITULO EN PANTALLA
	$Columnas = array("ID_SUCURSAL", "ARANCEL","NOMBRE","CODIGO","DIVISION","DEPTO","FAMILIA","EXISTENCIA","PEDIDA","DISPONIBLE","COSTOULTIMO","TOTALULTIMO","COSTOPROMEDIO"."TOTALPROMEDIO","FECULTENTRADA","ULTENTRADA","FECULTSALIDA","ULTSALIDA");//COLUMNAS GRID
	$CamposNvo = array("Usuario","Pass","Nombre","Celular","Empresa","Grupo","Perfil","Correo","PassCorreo","UsuarioFUM");//CAMPOS MODAL NUEVO
	$CamposNvoTipo = array("txt","txt","txt","txt","txt","txt","txt","txt","txt","txt");//CAMPOS MODAL TIPOS

?>
<body style=" background: url(img/back3.jpg) 0% 0% / cover no-repeat fixed;">

<?php include("navbar.php"); ?>

<div class="container-fluid">

	<div id="" class="col-sm-12" style="">
		<div class="panel panel-default"> 
			<div class="panel-heading"><h6><?php echo $TituloPantalla; /*Incluir modal nvo*/?></h6></div> 
			<div class="panel-body"> 		
                <?php $Columnas; /*Incluir modal nvo*/?>
                <form id="formulario" method="POST" class="form-inline">
                  <div class="form-group col-sm-2">
                    <?php echo CmbCualquieras("division","nombre","divisiones"); ?>
                  </div>
                  <div id="xxx" class="form-group col-sm-2">
                    <?php echo CmbGenerico('familia',''); ?>
                  </div>
                  <div class="form-group col-sm-2">
                    <input type="text"  name="filtro" id="filtro"  value="" class="form-control" placeholder="Filtre palabras"/>
                  </div>
                  <input type="submit" id="btnEnviar" class="btn btn-primary btn-sm" value="Consultar" onMouseOver="">
                </form>
                <div class="respuesta"></div>				
            </div>
        </div>
    </div>

</body>

<?php echo Script(); ?>

<script type="text/javascript"> 
    
 
    $(function () {
     $("form").on('submit', function (e) {

     e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'tablaExistencia.php',
            data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
            success: function(data)
            {
               $(".respuesta").html(data); // Mostrar la respuestas del script PHP.
            },
            error: function(error) {
                console.log(error);
                alert('Algo salio mal :S');
            }
        });

        return false; // Evitar ejecutar el submit del formulario.
     });
/*
        $("#enlaceajax").click(function(evento){
          evento.preventDefault();
          $("#cargando").css("display", "inline");
          $("#destino").load("pagina-lenta.php", function(){
             $("#cargando").css("display", "none");
        });
*/
   });

</script>

</html>