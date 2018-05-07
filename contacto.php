<?php

require_once 'autoload.php';

$siteKey = '6LcRHSQTAAAAAErm9z-AstEsKqifS7oFAIQp_VDi';
$secret = '6LcRHSQTAAAAAN6y_cv2vdWpno0FJbdEMZJfys8s';

$lang = 'en';

?>
<!DOCTYPE html>
<html class="no-js">

<?php 
    include("Funciones.php");
    $TituloPantalla = 'Registro de asistencia';  
    echo Cabecera($TituloPantalla); 
?>
<body style="background: aliceblue;">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 id="cabecera">
                    <?php echo $TituloPantalla; /*Incluir modal nvo*/?>
                </h3>
            </div>
            <div class="panel-body">
                <div class="col-sm-6">
				<form class="form-horizontal" id="contact-form" action="" method="POST">

				    <div class="form-group">
				        <label for="inputEmail3" class="col-sm-4 control-label">Nombre:</label>
				        <div class="col-sm-8">
				            <input type="text" class="form-control" id="Nombre" maxlength="60" required name="nombre" value="" placeholder="Ingrese su nombre">
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="inputEmail3" class="col-sm-4 control-label">Estado:</label>
				        <div class="col-sm-8">
				            <input type="text" class="form-control" id="edo" maxlength="60" required name="edo" value="" placeholder="Ingrese su estado">
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="inputEmail3" class="col-sm-4 control-label">Municipio:</label>
				        <div class="col-sm-8">
				            <input type="text" class="form-control" id="municipio" maxlength="60" required name="municipio" value="" placeholder="Ingrese su municipio">
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="inputEmail3" class="col-sm-4 control-label">Num. plantas:</label>
				        <div class="col-sm-8">
				            <input type="text" class="form-control" id="plantas" maxlength="60" required name="municipio" value="" placeholder="numero de plantas">
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="inputEmail3" class="col-sm-4 control-label">Superficie plantada:</label>
				        <div class="col-sm-8">
				            <input type="text" class="form-control" id="plantada" maxlength="60" required name="plantada" value="" placeholder="Ingrese su superficie">
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="inputEmail3" class="col-sm-4 control-label">Superficie por plantar:</label>
				        <div class="col-sm-8">
				            <input type="text" class="form-control" id="sinplanta" maxlength="60" required name="sinplanta" value="" placeholder="Ingrese su superficie">
				        </div>
				    </div>
<!--
			        <div class="form-group">
			            <div class="g-recaptcha col-sm-10 col-md-offset-2" data-sitekey="<?php echo $siteKey; ?>"></div>
			            <script type="text/javascript"
			                    src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
			            </script>
					</div>
-->
				    <div class="form-group">
				        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="action" >Confirmar asistencia</button>
				        </div>
				    </div>
				</form>
                </div>
                <div class="col-sm-6">
                    Hotel Posada del Río
                    Av. Francisco I. Madero #144 SurGomez Palacio, Durango,Mexico, 35000 
                    Tel: 871  7-14-33-99
                    Clave de reservación:
                     LagunaFigs

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14396.579909316362!2d-103.4957043!3d25.566843!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x837892e8694c227d!2sHotel+Posada+del+R%C3%ADo!5e0!3m2!1ses-419!2smx!4v1521821718570" class="col-sm-12" style="height:300px;border:0" allowfullscreen></iframe>
                </div>
		      </div>
            </div>
        </div>
        <?php echo Script(); ?>
    </body>

    <script type="text/javascript">
        $(function() {

            $("form").on('submit', function(e) {
                e.preventDefault();
				$('#CargaGif').show();
                $.ajax({
                    type: "POST",
                    url: 'tabla-contacto.php',
                    data: $("form").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data) {
						$('#CargaGif').hide();
                        $('#btnEnviar').removeAttr('disabled');
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
        
   
    </script>

</html>
