<!DOCTYPE html>
<html class="no-js">

<?php include("head-gobernador.php"); ?>
<?php
	$TituloPantalla = "Catalogo de direcciones";//TITULO EN PANTALLA
	$Columnas = array("USERID", "NAME", "FECHA","DIA","ENTRADA","ATT");//COLUMNAS GRID
	$CamposNvo = array("nombre", "direccion", "telefono","email","descripcion");//CAMPOS MODAL NUEVO
	$CamposNvoTipo = array("txt", "cmb", "txt","txt","txt");//CAMPOS MODAL TIPOS
    
?>
<body>

<?php include("navbar.php"); ?>

<div class="container-fluid">

	<?php include("vertical.php"); ?>

	<div id="" class="col-sm-10" style="">
		<div class="panel panel-default"> 
			<div class="panel-heading"><?php ECHO $TituloPantalla; /*Incluir modal nvo*/?></div> 
			<div class="panel-body"> 		
				<?php $Columnas; /*Incluir modal nvo*/?>
				<?php include("tabla.php"); /*Incluir grid*/?>
			</div>
			<?php include("controles.php"); /*Injcluir controles generales*/?>
		</div>
	</div>

	<?php $CamposNvo; /*Incluir modal nvo*/?>
	<?php $CamposNvoTipo; /*Incluir modal nvo*/?>
	<?php include("form.php"); /*Incluir modal nvo*/?>


</div>

</body>


    <script type="text/javascript"  src="js/jquery.min.js"></script>
    <script type="text/javascript"  src="js/bootstrap.js"></script>
    <script type="text/javascript"  src="js/validaciones.js"></script>

    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
    <!--<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>-->
    <script src="js/jeditable.min.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <link href="https://cdn.datatables.net/fixedheader/3.1.0/css/fixedHeader.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/fixedheader/3.1.0/js/dataTables.fixedHeader.min.js"></script>

    <!--<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.colVis.min.js"></script>

<script type="text/javascript"> 

    $(document).ready(function() {

     <?php include("grid_full.php"); ?>

    });

</script>

</html>