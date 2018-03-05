<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Reporte de edos. financieros'); ?>
<?php
    $TituloPantalla = 'Reporte de edos. financieros';    
?>

    <body style="background: url(./img/back3.jpg) 0% 0% / cover no-repeat fixed !important;">

        <div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
          <ul class="nav navmenu-nav">
                <li>
                    <a href="Existencias.php" id="Existencias" target="Existencias" type="button" class="list-group-item">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                        Existencias
                    </a>
                </li>

                <li>
                    <a href="Asistencias.php" id="Asistencias" target="Asistencias" type="button" class="list-group-item">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                        Asistencias
                    </a>
                </li>
                <li>
                    <a href="Usuarios.php" id="Usuarios" target="Usuarios" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                        Usuarios
                    </a>
                </li>
                <li>
                    <a href="cliedoctagral.php" id="cliedoctagral" target="cliedoctagral" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-euro" aria-hidden="true"></span> 
                        Cliedocta
                    </a>
                </li>
                <li>
                    <a href="commecanicos.php" id="commecanicos.php" target="commecanicos" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 
                        Comisiones mecanicos (TALLER)
                    </a>
                </li>
                <li>
                    <a href="commecanicosvtas.php" id="commecanicosvtas" target="commecanicosvtas" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 
                        Comisiones mecanicos (VENTAS)
                    </a>
                </li>
                <li>
                    <a href="comvendedores.php" id="comvendedores" href="comvendedores" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
                        Comisiones por vendedor
                    </a>
                </li>
                <li>
                    <a href="Vtasvendedores2.php" id="Vtasvendedores2" target="Vtasvendedores2" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
                        Ventas por vendedor
                    </a>
                </li>
                <li>
                    <a href="vtasxmecanico2.php" id="vtasxmecanico2" target="vtasxmecanico2" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
                        Ventas por mecanico
                    </a>
                </li>
                <li>
                    <a href="vtasserviciospreventivos2.php" id="vtasserviciospreventivos2" target="vtasserviciospreventivos2" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
                        Servicios preventivos
                    </a>
                </li>
                <li>
                    <a href="ejercicios.php" id="ejercicios" target="ejercicios" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
                        Almacen vs contabilidad
                    </a>
                </li>
            <li>
                <a href="salir.php" type="button" class="list-group-item">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar sesión
                </a>
            </li> 
          </ul>

        </div>

        <div class="navbar navbar-default navbar-fixed-top">
          <button  id="edo" target="edo"  type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body" style=" background: #337ab7;">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        
        <div id="principal" class="container-fluid"></div>

        <?php include("barratareas.php"); ?>
    
        <?php echo Script(); ?>
    </body>

    
    <script type="text/javascript"> 
        $(document).on('click','.close',function(){
            //id del item menu
            var ID = $( this ).attr("name");
            $( "#navbar #"+ID ).remove();
            $( "#ifm"+ID ).remove();
        });
        
        $(document).on('click','.vna-act',function(){
            //id de ventana
            var ids = $( this ).attr("id");
            //id de iframe a partir de ventana
            
            var idcomplete = '#ifm'+ids;
            //$("#principal iframe").attr('class').replace('ifmOpen','ifmMini');
            //cambiar clase de abierto a cerrado a iframe
            //$("#principal iframe").attr('class').replace('ifmOpen','ifmMini');
            $("#principal iframe").hide();
            //cambiar clase de activo a inactivo a ventana
            $("#navbar a").attr('class').replace('vna-act', 'vna-min');
            //cambiar clase de activo a inactivo a ventana
            $(this).removeClass( 'vna-act' ).addClass( 'vna-min' );
            //$(this).attr('class').replace('vna-act', 'vna-min');
            //$( '.ifmOpen' ).hide();
            $( idcomplete ).hide();
        });
        
        $(document).on('click','.vna-min',function(){
            //id de ventana
            var ids = $( this ).attr("id");
            //id de iframe a partir de ventana
            var idcomplete = '#ifm'+ids;
            //cambiar clase de abierto a cerrado a iframe
            //$("#principal iframe").attr('class').replace('ifmMini','ifmOpen');
            $("#principal iframe").hide();
            //cambiar clase de activo a inactivo a ventana
            $("#navbar a").attr('class').replace('vna-act', 'vna-min');
            //cambiar clase de activo a inactivo a ventana
            $(this).removeClass( 'vna-min' ).addClass( 'vna-act' );
            //$(this).attr('class').replace('vna-min', 'vna-act');
            //$( '.ifmOpen' ).hide();
            $( idcomplete ).show();
        });
        
        $(document).on('click','.list-group-item',function(){
            //id del item menu
            var IDFRM = $( this ).attr("id");
            //id del iframe
            var modal2 = "<iframe id='ifm"+IDFRM+"' name='"+IDFRM+"' frameborder='0' class='col-sm-12'></iframe>";
            //id de la ventana
            var ventana = "<a id='"+IDFRM+"' class='vna-act'>"+IDFRM+"<button class='close' name='"+IDFRM+"'>x</button></a>";
            //dibujamos iframe dentro de div principal
            $( "#principal" ).append( modal2 );
            //dibujamos ventana en barra de tareas
            $( "#navbar" ).append( ventana );
            
            $( ".ifmOpen" ).addClass('ifmMini').removeClass('ifmOpen');
            $("#navbar > a").attr('class').replace('vna-act', 'vna-min');

            //$( ".vna-act" ).addClass('vna-min').removeClass('vna-act');
            //$( ".vna-act" ).removeClass('vna-act');
            //$( "#"+IDFRM ).addClass( 'vna-act' );
            $("#"+IDFRM).attr('class').replace('vna-min', 'vna-act');
            $( "#ifm"+IDFRM ).addClass('ifmOpen');
        });


        
        $(document).ready(function() {

        } );

    </script>
    <script language="JavaScript" type="text/javascript">
        function show5(){
            if (!document.layers&&!document.all&&!document.getElementById)
            return

             var Digital=new Date()
             var hours=Digital.getHours()
             var minutes=Digital.getMinutes()
             var seconds=Digital.getSeconds()

             var dn="PM"
             if (hours<12)
             dn="AM"
             if (hours>12)
             hours=hours-12
             if (hours==0)
             hours=12

             if (minutes<=9)
             minutes="0"+minutes
             if (seconds<=9)
             seconds="0"+seconds
            //change font size here to your desire
            myclock=hours+":"+minutes+":"
             +seconds+" "+dn
            if (document.layers){
            document.layers.liveclock.document.write(myclock)
            document.layers.liveclock.document.close()
            }
            else if (document.all)
            liveclock.innerHTML=myclock
            else if (document.getElementById)
            document.getElementById("liveclock").innerHTML=myclock
            setTimeout("show5()",1000)
        }
        window.onload=show5
     </script>

</html>
