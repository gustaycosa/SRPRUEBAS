<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php");
    $TituloPantalla = "Reporte de Existencias";
    echo Cabecera($TituloPantalla);
?>

    <body>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6><?php echo $TituloPantalla; /*Incluir modal nvo*/?></h6>
            </div>
            <div class="panel-body">
                <form id="formulario" method="POST" class="form-inline">
                    <div class="form-group">
                        <?php echo CmbCualquieras('depto','nombre',"deptos"); ?>
                    </div>
                    <div class="form-group">
                        <?php echo CmbCualquieras("division","nombre","divisiones"); ?>
                    </div>
                    <div id="xxx" class="form-group">
                        <?php echo CmbGenerico(' ',' '); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Txtfiltro" id="Txtfiltro" value="" class="form-control" placeholder="Palabras clave" />
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btnEnviar" class="btn btn-primary btn-sm" onMouseOver="">Consultar</button>
                    </div>
                </form>
                <div class="controles form-horizontal"></div>
                <div class="respuesta"></div>
                <?php echo CargaGif();?>
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
            $('#CargaGif').show();
            $('#btnEnviar').attr('disabled', 'disabled')
            $.ajax({
                type: "POST",
                url: 'tabla-admexistencias.php',
                data: $("form").serialize(),
                success: function(data) {
                    $('#CargaGif').hide();
                    $('#btnEnviar').removeAttr('disabled');
                    $(".respuesta").html(data); // Mostrar la respuestas del script PHP.
                },
                error: function(error) {
                    $('#CargaGif').hide();
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
