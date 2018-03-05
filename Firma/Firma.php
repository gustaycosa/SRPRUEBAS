<!DOCTYPE html>
<html class="no-js">

<?php include("../head-tayco.php"); ?>

<body>
    <div id="InxContacto" class="col-sm-12 back2 AntiRL">
      <div class="col-sm-12">
        <form class="form-horizontal col-sm-12 col-md-offset-3" id="contact-form" action="" method="POST">

          <h3 class="page-header">Contactanos</h3>
 
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Nombre" maxlength="60" required name="nombre" value="" placeholder="Ingrese su nombre">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Apellido paterno:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Nombre" maxlength="60" required name="nombre" value="" placeholder="Ingrese su nombre">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Apellido Materno:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Nombre" maxlength="60" required name="nombre" value="" placeholder="Ingrese su nombre">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Telefono:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="Telefono" maxlength="13" required name="telefono" value="" placeholder="Ingrese su telefono">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Email" maxlength="60" required name="correo" value="" placeholder="Ingrese su email">
                </div>
            </div>
          </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="action" value="Enviar" />
                </div>
            </div>
        </form>
      </div>
    </div>
<table id="foo" 
  style="font-family: arial; 
         font-size: 14px;
         background-color: #f5f5f5"
 >
  <tr>
    <td style="padding: 5px 0 5px 5px">
      <img
         src="JCB.jpg" 
         alt="" 
         width="80" 
         height="80" 
         style="display:block; margin-right: 5px; border-radius: 50%"
       >
    </td>
    <td 
      style="vertical-align:top; 
             padding:5px 5px 5px 10px; 
             border-left: 4px solid steelblue"
    >
      <strong 
        style="font-size:1.2em; 
               display: block; 
               margin-bottom: 3px; 
               color: steelblue"
      >
        Ing. Gustavo Hernandez Soto
      </strong>
      <p 
        style="font-size:0.9em; 
               margin: 0; 
               color: #666"
      >
        Tecnologia Agricola y Construccion | Departamento de sistemas
      <br />
      <a 
         href="http://escuela.digital" 
         style="display:block;
                text-decoration: none;
                margin-bottom: 8px; 
                color: steelblue"
       >
        8711117962
      </a>
      <a 
         href="http://escuela.digital" 
         style="display:block;
                text-decoration: none;
                margin-bottom: 8px; 
                color: steelblue"
       >
        gustavo.hernandez@taycosa.mx
      </a>
      <a 
         href="http://escuela.digital" 
         style="display:block;
                text-decoration: none;
                margin-bottom: 8px; 
                color: steelblue"
       >
        http://www.taycosa.mx
      </a>
        <a 
         href="http://escuela.digital/facebook" 
         style="display:inline-block;
                background-color:#365899;
                color:#ffffff;
                text-decoration:none; 
                line-height:19px; 
                height: 18px;
                padding: 0 10px; 
                font-size: 12px"
       >
        Facebook
      </a>
      <a 
         href="http://escuela.digital/youtube" 
         style="display:inline-block;
                background-color:#CC181E;
                color:#ffffff;
                text-decoration:none; 
                line-height:19px; 
                height: 18px;
                padding: 0 10px; 
                font-size: 12px"
       >
        YouTube
      </a>
      <a 
         href="http://escuela.digital/twitter" 
         style="display:inline-block;
                background-color:#1B9AE8;
                color:#ffffff;
                text-decoration:none; 
                line-height:19px; 
                height: 18px;
                padding: 0 10px; 
                font-size: 12px"
       >
        Twitter
      </a>
      </p>
    </td>
  </tr>
</table>
<table width="100%"
  style="font-family: arial; 
         font-size: 14px;
         background-color: #000000;">
  <tr>
    <td style="padding: 0 0 0 0">
        Todos los derechos reservados.
    </td>
    </td>
  </tr>
</table>

</body>

<?php include("../script-tayco.php"); ?>

<script type="text/javascript">
    $(document).ready(function() {
    var Nombre = new LiveValidation('Nombre');
    Nombre.add( Validate.Presence );
    Nombre.add( Validate.Length, { minimum: 10, maximum: 60 } );

    var Telefono = new LiveValidation('Telefono');
    Telefono.add( Validate.Presence );
    Telefono.add( Validate.Numericality );
    Telefono.add( Validate.Numericality, { onlyInteger: true } );
    Telefono.add( Validate.Length, { minimum: 10, maximum: 13 } );

    var Email = new LiveValidation('Email');
    Email.add( Validate.Presence );
    Email.add( Validate.Email );
    Email.add( Validate.Length, { minimum: 10, maximum: 35 } );

    var Mensaje = new LiveValidation('Mensaje');
    Mensaje.add( Validate.Presence );
    Mensaje.add( Validate.Length, { minimum: 10, maximum: 500 } );
  });
</script>

<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
<script type="text/javascript">
  var clipboard = new Clipboard('.btn');
</script>
<!-- Objetivo -->
<input id="fot" value="Texto a copiar">

<!-- Disparador -->
<button class="btn" data-clipboard-target="#foo">
  Copiar al portapapeles
</button>