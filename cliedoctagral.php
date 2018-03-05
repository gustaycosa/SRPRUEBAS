<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Reporte Cliente / Cuenta'); ?>
<?php
    $TituloPantalla = 'Reporte Cliente / Cuenta';    
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
                        <label for="inputFechaIni">Moneda:</label>
                        <select id="CmbMoneda" name="CmbMoneda" class="form-control">
                      <option>PESOS</option>
                      <option>DOLARES</option>
                  </select>
                    </div>
                    <div class="input-group">
                      <input type="text" class="form-control" id="TxtCliente" name="TxtCliente" placeholder="Buscar cliente">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                      </span>
                    </div>
                    <div class="form-group">
                        <label for="inputFechaIni">Empresa:</label>
                        <select id="CmbEmpresa" name="CmbEmpresa" class="form-control">
                              <option>TAYCOSA</option>
                          </select>
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
                <div class="controles form-horizontal">
                <?php include("TablaClientes.php"); ?>
                </div>
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
                    url: 'tablaCliedoctagral.php',
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
        /*
             $('input[type="submit"]').attr('disabled','disabled');
                $('input[type="text"]').keypress(function(){
                    if($(this).val() != ''){
                       $('input[type="submit"]').removeAttr('disabled');
                    }
             });
        */
        /*
        $('#gridpop').DataTable( {
            fixedHeader: true,          
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todo"]],
            "language": {
                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "No se encontraron resultados",
                "sEmptyTable":    "Ningún dato disponible en esta tabla",
                "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":   "",
                "sSearch":        "Buscar:",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":    "Último",
                    "sNext":    "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
            }
        } );
        */
        <?php
        echo GridPop();
        /*
        echo Oculta("#BtnRefrescar",".controles","1");
        echo Oculta("#BtnCancel","#Controles","2");    
        echo Oculta("#BtnCancel","#ControlesModificar","2");
        */
    ?>

    </script>

</html>
