<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Reporte de edos. nomina'); ?>
<?php
    $TituloPantalla = 'Reporte de edos. nomina';    
?>

    <body>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 id="cabecera">
                    <?php ECHO $TituloPantalla; /*Incluir modal nvo*/?>
                </h6>
            </div>
            <div class="panel-body">
                <form id="formulario" method="POST" class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" id="TxtGasto" name="TxtGasto" value="1GA01" placeholder="gasto">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="TxtCta" name="TxtCta" value="52" placeholder="cta">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="TxtEmp" name="TxtEmp" value="32" placeholder="emp">
                    </div>

                    <button type="submit" id="btnEnviar" class="btn btn-primary btn-sm" onMouseOver="">Consultar</button>
                </form>
                <div class="controles form-horizontal">

                </div>
                <div class="respuesta">
                </div>
            </div>
        </div>
    </body>

    <?php echo Script(); ?>

    <script type="text/javascript"> 
        
        $(document).ready(function() {
            var table = $('#grid').DataTable({
                scrollY: 200,
                scrollX: true
            } );
        } );

    </script>

    <script type="text/javascript">
        $(function() {

            $("form").on('submit', function(e) {

                e.preventDefault();
                $('#btnEnviar').attr('disabled', 'disabled')
                $.ajax({
                    type: "POST",
                    url: 'tabla-excel.php',
                    data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data) {
                        $('#btnEnviar').removeAttr('disabled');
                        $(".respuesta").html(data); // Mostrar la respuestas del script PHP.
                        $(".respuesta").show();
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Algo salio mal :S');
                    }
                });

                return false; // Evitar ejecutar el submit del formulario.
            });
        });

        $('.Seleccionado').dblclick(function() {
            var id = $(this).attr("data-id");
            var name = $(this).attr("data-name");
            $("#TxtCliente").val(id);
            $("#title").html("Reporte cliente - " + id + " " + name);
            $("#cabecera").html("Reporte cliente - " + id + " " + name);
            $('#myModal').modal('hide');
        });

    </script>

</html>
