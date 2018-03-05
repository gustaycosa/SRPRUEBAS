<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Reporte de edos. financieros'); ?>
<?php
    $TituloPantalla = 'Reporte de edos. financieros';    
?>

    <body style="background: url(./img/back3.jpg) 0% 0% / cover no-repeat fixed !important;">
        <?php include("navgroup.php"); ?>
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
