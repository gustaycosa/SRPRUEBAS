<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Reporte de edos. balance general'); ?>
<?php
    $TituloPantalla = 'Reporte de edos. balance general';    
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
                        <label for="inputFechaIni">Ejercicio:</label>
                        <input type="text" class="form-control" id="TxtEjercicio" name="TxtEjercicio" value="<?php echo date("Y");?>" placeholder="Ingrese ejercicio">
                    </div>
                    <div class="form-group">
                        <label for="inputFechaIni">Mes:</label>
                        <select id="TxtMes" name="TxtMes" class="form-control">
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>

                    <button type="submit" id="btnEnviar" class="btn btn-primary btn-sm" onMouseOver="">Consultar</button>
                    
                    <button id="BtnAnaCli" class="btn btn-primary" type="button" data-toggle="modal" data-target="#MdlAntCli">
                        Clientes
                    </button>
                    <button id="BtnAnaDeu" class="btn btn-primary" type="button" data-toggle="modal" data-target="#MdlAnaDeu">
                        Deudores
                    </button>
                    <button id="BtnAnaAnt" class="btn btn-primary" type="button" data-toggle="modal" data-target="#MdlAnaAnt">
                        Anticipos
                    </button>
                    <button id="BtnAnaAcr" class="btn btn-primary" type="button" data-toggle="modal" data-target="#MdlAnaAcr">
                        Acreedores
                    </button>
                    <button id="BtnAnaPro" class="btn btn-primary" type="button" data-toggle="modal" data-target="#MdlAnaPro">
                        Proveedores
                    </button>
                    
                </form>
                <div class="controles form-horizontal">

                </div>
                <div class="respuesta">
                </div>
                <?php echo CargaGif();?>
            </div>

            <?php echo MdlSearch('MdlAntCli','Clientes');?>
            <?php echo MdlSearch('MdlAnaAnt','Anticipos clientes');?>
            <?php echo MdlSearch('MdlAnaDeu','Deudores diversos');?>
            <?php echo MdlSearch('MdlAnaAcr','Acreedores diversos');?>
            <?php echo MdlSearch('MdlAnaPro','Proveedores');?>
        </div>
    </body>

    <?php echo Script(); ?>

    <script type="text/javascript">
        $(function() {
            $('#BtnAnaCli').click(function() {
                //$('#btnEnviar').attr('disabled', 'disabled')
                $('#CargaGif').show();
                $.ajax({
                    type: "POST",
                    url: 'TablaAnaCli.php',
                    data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data) {
                        //$('#btnEnviar').removeAttr('disabled');
                        $('#CargaGif').hide();
                        $("#DivMdlAntCli").html(data); // Mostrar la respuestas del script PHP.
                        $("#DivMdlAntCli").show();
                        $('#MdlAntCli').modal('show');
                        $('#gridcli').DataTable().draw();
                    },
                    error: function(error) {
                        $('#CargaGif').hide();
                        console.log(error);
                        alert('Algo salio mal :S');
                    }
                });
                return false; // Evitar ejecutar el submit del formulario.
            });
            
            $('#BtnAnaDeu').click(function() {
                //$('#btnEnviar').attr('disabled', 'disabled')
                $('#CargaGif').show();
                $.ajax({
                    type: "POST",
                    url: 'TablaAnaDeu.php',
                    data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data) {
                        //$('#btnEnviar').removeAttr('disabled');
                        $('#CargaGif').hide();
                        $("#DivMdlAnaDeu").html(data); // Mostrar la respuestas del script PHP.
                        $("#DivMdlAnaDeu").show();
                        $('#MdlAnaDeu').modal('show');
                        $('#griddeu').DataTable().draw();
                    },
                    error: function(error) {
                        $('#CargaGif').hide();
                        console.log(error);
                        alert('Algo salio mal :S');
                    }
                });
                return false; // Evitar ejecutar el submit del formulario.
            });
            
            $('#BtnAnaPro').click(function() {
                //$('#btnEnviar').attr('disabled', 'disabled')
                $('#CargaGif').show();
                $.ajax({
                    type: "POST",
                    url: 'TablaAnaPro.php',
                    data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data) {
                        //$('#btnEnviar').removeAttr('disabled');
                        $('#CargaGif').hide();
                        $("#DivMdlAnaPro").html(data); // Mostrar la respuestas del script PHP.
                        $("#DivMdlAnaPro").show();
                        $('#MdlAnaPro').modal('show');
                        $('#gridpro').DataTable().draw();
                    },
                    error: function(error) {
                        $('#CargaGif').hide();
                        console.log(error);
                        alert('Algo salio mal :S');
                    }
                });
                return false; // Evitar ejecutar el submit del formulario.
            });
            
            $('#BtnAnaAnt').click(function() {
                //$('#btnEnviar').attr('disabled', 'disabled')
                $('#CargaGif').show();
                $.ajax({
                    type: "POST",
                    url: 'TablaAnaAnt.php',
                    data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data) {
                        //$('#btnEnviar').removeAttr('disabled');
                        $('#CargaGif').hide();
                        $("#DivMdlAnaAnt").html(data); // Mostrar la respuestas del script PHP.
                        $("#DivMdlAnaAnt").show();
                        $('#MdlAnaAnt').modal('show');
                        $('#gridant').DataTable().draw();
                    },
                    error: function(error) {
                        $('#CargaGif').hide();
                        console.log(error);
                        alert('Algo salio mal :S');
                    }
                });
                return false; // Evitar ejecutar el submit del formulario.
            });

            $('#MdlAnaAcr').click(function() {
                //$('#btnEnviar').attr('disabled', 'disabled')
                $('#CargaGif').show();
                $.ajax({
                    type: "POST",
                    url: 'TablaAnaAcr.php',
                    data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data) {
                        //$('#btnEnviar').removeAttr('disabled');
                        $('#CargaGif').hide();
                        $("#DivMdlAnaAcr").html(data); // Mostrar la respuestas del script PHP.
                        $("#DivMdlAnaAcr").show();
                        $('#MdlAnaAcr').modal('show');
                        $('#gridacr').DataTable().draw();
                    },
                    error: function(error) {
                        $('#CargaGif').hide();
                        console.log(error);
                        alert('Algo salio mal :S');
                    }
                });
                return false; // Evitar ejecutar el submit del formulario.
            });
            
            $("form").on('submit', function(e) {
                e.preventDefault();
                $('#CargaGif').show();
                $('#btnEnviar').attr('disabled', 'disabled')
                $.ajax({
                    type: "POST",
                    url: 'tabla-edobalgral.php',
                    data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data) {
                        $('#CargaGif').hide();
                        $('#btnEnviar').removeAttr('disabled');
                        $(".respuesta").html(data); // Mostrar la respuestas del script PHP.
                        $(".respuesta").show();
                    },
                    error: function(error) {
                        $('#CargaGif').hide();
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
