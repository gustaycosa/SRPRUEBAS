<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">
    
<?php include("head-gobernador.php"); ?>
    
<?php
	$TituloPantalla = "Catalogo de usuarios";//TITULO EN PANTALLA
	$Columnas = array("id", "usuario","Tipo","nombre","Perfil","grupo","telefono");//COLUMNAS GRID
	$CamposNvo = array("Usuario","Pass","Nombre","Celular","Empresa","Grupo","Perfil","Correo","PassCorreo","UsuarioFUM");//CAMPOS MODAL NUEVO
	$CamposNvoTipo = array("txt","txt","txt","txt","txt","txt","txt","txt","txt","txt");//CAMPOS MODAL TIPOS
    
    //$WSFucntion = "UsuariosSelect" ;
    $WSFucntion = "Usuarios" ;

?>
<body cz-shortcut-listen="true" style=" background: url(img/back3.jpg) 0% 0% / contain;">

<?php include("navbarv.php"); ?>

<div class="container-fluid">

	<div id="" class="col-sm-12" style="">
        <h1>Bienvenido</h1>  
	</div>


</div>

</body>


<?php include("script-gobernador.php"); ?>
<script type="text/javascript"> 

    $(document).ready(function() {



    });

</script>

</html>