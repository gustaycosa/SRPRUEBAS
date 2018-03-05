<!DOCTYPE html>
<html class="no-js">
<?php include("sesion.php"); ?>
<?php include("head-gobernador.php"); ?>
<?php include("script-gobernador.php"); ?>
    
<?php
	$TituloPantalla = "Maquinaria en Servicio";//TITULO EN PANTALLA
	$Columnas = array("TALLER", "CASO","SERVICIO","FECHARECEPCION","CLIENTE","MARCA","TIPOMAQUINARIA","MODELO","SERIE","CONCEPTO","MECANICO","HORA_MO","COSTOTOTAL","PRECIOVTATOTAL","ULT_OBSERVACION");//COLUMNAS GRID
	//$CamposNvo = array("Usuario","Pass","Nombre","Celular","Empresa","Grupo","Perfil","Correo","PassCorreo","UsuarioFUM");//CAMPOS MODAL NUEVO
	//$CamposNvoTipo = array("txt","txt","txt","txt","txt","txt","txt","txt","txt","txt");//CAMPOS MODAL TIPOS
    
    //$WSFucntion = "UsuariosSelect" ;
    $WSFunction = "Rpt_Maquinaria_Servicio" ;

?>
<body>

<?php include("navbar.php"); ?>

<div class="container-fluid">

	<?php include("vertical.php"); ?>

	<div id="" class="col-sm-10" style="">
		<div class="panel panel-default"> 
			<div Id="Titulo" class="panel-heading"><?php ECHO $TituloPantalla; /*Incluir modal nvo*/?></div> 
			<div class="panel-body"> 		
				<?php $Columnas; /*Incluir modal nvo*/?>
                <?php $WSFucntion /*Incluir WS*/?>
				<?php include("tablaMaquinariaEnServicio.php"); /*Incluir grid*/?>
			</div>
			<?php include("controles.php"); /*Injcluir controles generales*/?>
		</div>
	</div>

	<?php $CamposNvo; /*Incluir modal nvo*/?>
	<?php $CamposNvoTipo; /*Incluir modal nvo*/?>
	<?php include("form.php"); /*Incluir modal nvo*/?>


</div>

</body>



<script type="text/javascript"> 

    $(document).ready(function() {

     //form carga submit
     <?php include("frmajax.php"); ?>

    $('#BtnRefrescar').click(function() {
        $.ajax({
            type: 'POST',
            url: 'http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx/GetUsuarios',
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function(response) {
                $('#Titulo').html(JSON.stringify(response));
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
        
      <?php include("grid_combo.php"); ?>
        
    });


    
</script>

</html>