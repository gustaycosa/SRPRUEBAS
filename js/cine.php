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
    <style>
        .blue{
            background: gray;
        }
        .red{
            background: red;
            height: 20px;
            border: solid white 1px;
        }
    </style>
    <div class="container-fluid"> 
        <diV class="row">
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
            <diV class="col-sm-10 blue">
                <diV class="col-sm-1 col-sm-offset-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
            </diV>
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
        </diV>
        <diV class="row">
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
            <diV class="col-sm-10 blue">
                <diV class="col-sm-1 col-sm-offset-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
            </diV>
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
        </diV>
        <diV class="row">
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
            <diV class="col-sm-10 blue">
                <diV class="col-sm-1 col-sm-offset-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
            </diV>
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
        </diV>
        <diV class="row">
            <diV class="col-sm-12 blue">
                lounge
            </diV>
        </diV>
        <diV class="row">
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
            <diV class="col-sm-10 blue">
                <diV class="col-sm-1 col-sm-offset-2 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
            </diV>
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
        </diV>
        <diV class="row">
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
            <diV class="col-sm-10 blue">
                <diV class="col-sm-1 col-sm-offset-2 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
                <diV class="col-sm-1 red"></diV>
            </diV>
            <diV class="col-sm-1 blue">
                <diV class="col-sm-12 red"></diV>
            </diV>
        </diV>
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
    });
    <?php
        echo GridPop();
    ?>

</script>

</html>