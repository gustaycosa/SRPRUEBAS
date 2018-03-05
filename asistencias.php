<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Asistencias'); ?>
<?php
    $TituloPantalla = 'Asistencias';    
?>

    <body>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 id="cabecera">
                    <?php echo $TituloPantalla; ?>
                </h6>
            </div>
            <div class="panel-body">
                <form id="formulario" method="POST" class="form-inline">
                    <div class="form-group">
                        <label for="inputFechaIni">Empresa:</label>
                        <select id="CmbEmpresa" name="CmbEmpresa" class="form-control">
                        <option>TAYCOSA</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="inputFechaIni">Empleado:</label>
                        <?php echo CmbCualquieras('USERID','NAME','ATT_USERINFO'); ?>
                    </div>
                    <div class="form-group">
                        <label for="inputFechaIni">De:</label>
                        <input type="date" name="Fini" id="Fini" value="<?php echo date("Y-m-d");?>" class="form-control" placeholder="Rango Fecha Inicial" />
                    </div>
                    <div class="form-group">
                        <label for="inputFechaFin">A:</label>
                        <input type="date" name="Ffin" id="Ffin" value="<?php echo date("Y-m-d");?>" class="form-control" placeholder="Rango Fecha Final">
                    </div>
                    <button type="submit" id="btnEnviar" class="btn btn-primary btn-sm" onMouseOver="">Consultar</button>
                </form>
                <div class="respuesta"></div>
            </div>
        </div>
    </body>

    <?php echo Script(); ?>

    <script type="text/javascript">
        $(function() {
            $("form").on('submit', function(e) {
                e.preventDefault();
                $('#btnEnviar').attr('disabled', 'disabled')
                $.ajax({
                    type: "POST",
                    url: 'tablaAsistencias.php',
                    data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
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
            
            $('select#CmbATT_USERINFO').on('change', function() {
                var id = $('#CmbATT_USERINFO').val();
                var name = $('#CmbATT_USERINFO option:selected').html();
                $("#title").html("Reporte asistencias - " + id + " " + name);
                $("#cabecera").html("Reporte asistencias - " + id + " " + name);
            });
        });

    </script>

</html>
