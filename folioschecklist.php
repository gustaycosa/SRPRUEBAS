<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Folios checklist'); ?>
<?php
    $TituloPantalla = 'Folios checklist';    
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
                <label for="inputFechaIni">Empleado:</label>
                <?php echo CmbCualquieras('USERID','NAME','ATT_USERINFO'); ?>
              </div>
              <div class="form-group">
                  <label for="inputFechaIni">Serie:</label>
                  <select id="CmbSerie" name="CmbSerie" class="form-control">
                        <option>H</option>
                        <option>S</option>
                        <option>T</option>
                        <option>D</option>
                        <option>DG</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="inputFechaIni">De:</label>
                <input type="text"  name="txtde" id="txtde" value="" class="form-control" placeholder="De"/>
              </div>
              <div class="form-group">
                <label for="inputFechaFin">A:</label>
                <input type="text"  name="txta" id="txta" value="" class="form-control" placeholder="A"/>
              </div>
              <button type="submit" id="btnEnviar" class="btn btn-primary btn-sm" onMouseOver="">Consultar</button>
            </form>
            <div class="respuesta"></div>
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
               url: 'tablaFoliosChecklist.php',
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
        
        $('select#Cmbvendedores').on('change', function() {
            var id = $('#Cmbvendedores').val();
            var name = $('#Cmbvendedores option:selected').html();
            $("#title").html("Reporte ventas - CLAVE " + id + " - " + name);
            $("#cabecera").html("Reporte ventas - CLAVE " + id + " - " + name);
        });
    });

</script>

</html>