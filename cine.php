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
        .image{
            height: 200px;
            width: 200px;
        }
    </style>
    <div class="container-fluid"> 
        <div class="thumbnail"> 
        <div class="image" style="backgroud:url('https://www.google.com.mx/search?q=hugo+boss&rlz=1C1CHBD_esMX787MX787&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjl-oyo363aAhWcn4MKHRCXAWQQ_AUICigB&biw=1440&bih=809#imgrc=j3_IfNig7jZwlM:');"></div>
        <div class="caption"> <h3>Thumbnail label</h3> <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p> </div> </div>
    </div>
</body>

<?php echo Script(); ?>
    
<script type="text/javascript"> 

        <diV class="row">
            <diV class="col-sm-12 blue">
                lounge
            </diV>
        </diV>
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