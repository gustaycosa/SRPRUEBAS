<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Reporte por maquinaria'); ?>
<?php
    $TituloPantalla = 'Reporte por maquinaria';    
?>
<body>

<?php include("navbarv.php"); ?>
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 id="cabecera"><?php ECHO $TituloPantalla; /*Incluir modal nvo*/?>
            </h6></div> 
        <div class="panel-body"> 

            <form id="formulario" method="POST" class="form-inline">
              <div class="form-group">
                  <label for="inputFechaIni">Marca:</label>
                  <div class="col-sm-2">
                      <?php echo CmbCualquieras('id_marca','marca',"marcas"); ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputFechaIni">Tipo:</label>
                  <div class="col-sm-2">
                      <?php echo CmbCualquieras('Id_TipoMaquinaria','TipoMaquinaria',"TipoMaquinaria"); ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputFechaIni">Modelo:</label>
                  <div class="col-sm-2">
                      <?php echo CmbGenerico2('',''); ?>
                  </div>
              </div>
                <div class="input-group">
                  <input type="text" class="form-control" id="TxtMaquinaria" name="TxtMaquinaria" placeholder="Buscar maquina">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#mdl_maquinaria">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                  </span>
                </div>
              <div class="form-group">
                  <label for="inputFechaIni">Clasificacion:</label>
                  <select id="CmbEmpresa" name="CmbEmpresa" class="form-control">
                      <option>TAYCOSA</option>
                  </select>
              </div>
              <button type="submit" id="btnEnviar" class="btn btn-primary btn-sm" onMouseOver="">Consultar</button>
                <input type="text" class="form-control" id="TxtRowID" name="TxtMaquinaria" placeholder="Buscar maquina">
            </form>
            
            <div class="respuesta"></div>
            <?php include("TablaMaquinaria.php"); ?>
            <?php include("mdl_acond.php"); ?>
        </div>
    </div>
</body>

<?php echo Script(); ?>
    
<script type="text/javascript"> 

        
    $(function () {
         $("form").on('submit', function (e) {

         e.preventDefault();
         $('#btnEnviar').attr('disabled', 'disabled')
         $.ajax({
               type: "POST",
               url: 'maquinaspropias-tabla.php',
               data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
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
        
        $('select#Cmbmarcas').on('change', function() {
            $.ajax({
                url: 'cmbgenerico2.php',
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

        $('select#CmbTipoMaquinaria').on('change', function() {
            $.ajax({
                url: 'cmbgenerico2.php',
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
        
        $('.Seleccionado').dblclick(function() {
            var id = $(this).attr("data-id");
            var name = $(this).attr("data-name");
            $("#TxtMaquinaria").val(id);
            $("#title").html("Reporte cliente - " + id + " " + name);
            $("#cabecera").html("Reporte cliente - " + id + " " + name);
            $('#myModal').modal('hide');
        });
        
        $('.Clikeado').click(function() {
            var id = $(this).attr("data-id");
            alert(id);
            $("#TxtRowID").val(id);
            
                $.ajax({
                    url: "acondicionamiento.php",
                    type: "POST",
                    async: true,
                    /*
                    data: {
                        Data1: $(this).attr("data-id")
                    },
                    success: function(data) {
                        //do somthing here
                        var id = $(this).attr("data-id");
                        alert(id);
                        
                        $('#datos').html(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                    });
                    */
                    data: $("form").serialize(),
                    success: function(data) {
                        $("#datos").html(data); // Mostrar la respuestas del script PHP.
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Algo salio mal :S');
                    }
                });
        });
    });
    <?php
        echo GridPop();
    ?>

</script>

</html>