<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Existencias'); ?>
<?php
	$TituloPantalla = "Reporte de Existencias";//TITULO EN PANTALLA
?>

    <body>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6>
                    <?php echo $TituloPantalla; /*Incluir modal nvo*/?>
                </h6>
            </div>
            <div class="panel-body">
                <?php $Columnas; /*Incluir modal nvo*/?>
                <form id="formulario" method="POST" class="form-horizontal">
                    <div class="col-sm-2">
                        <?php echo CmbCualquieras('depto','nombre',"deptos"); ?>
                    </div>
                    <div class="col-sm-2">
                        <?php echo CmbCualquieras("division","nombre","divisiones"); ?>
                    </div>
                    <div id="xxx" class="form-group col-sm-2">
                        <?php echo CmbGenerico(' ',' '); ?>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="Txtfiltro" id="Txtfiltro" value="" class="form-control" placeholder="Palabras clave" />
                    </div>
                    <input type="submit" id="btnEnviar" class="btn btn-primary btn-sm col-sm-2" value="Consultar" onMouseOver="">
                </form>
                <div class="respuesta"></div>
            </div>
        </div>
    </body>

    <?php echo Script(); ?>

    <script type="text/javascript">
        $('select#Cmbdivisiones').on('change', function() {
            $.ajax({
                url: 'cmbgenerico.php',
                type: 'POST',
                async: true,
                data: $("form").serialize(),
                success: function(data) {
                    $("#xxx").html(data); // Mostrar la respuestas del script PHP.
                },
                error: function(error) {
                    console.log(error);
                    alert('Algo salio mal :S');
                }
            });
        });

        $('select#Cmbdeptos').on('change', function() {
            $.ajax({
                url: 'cmbgenerico.php',
                type: 'POST',
                async: true,
                data: $("form").serialize(),
                success: function(data) {
                    $("#xxx").html(data); // Mostrar la respuestas del script PHP.
                },
                error: function(error) {
                    console.log(error);
                    alert('Algo salio mal :S');
                }
            });
        });

        $("form").on('submit', function(e) {
            e.preventDefault();
            $('#btnEnviar').attr('disabled', 'disabled')
            $.ajax({
                type: "POST",
                url: 'tablaExistencia.php',
                data: $("form").serialize(),
                success: function(data) {
                    $('#btnEnviar').removeAttr('disabled');
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

    </script>

</html>
