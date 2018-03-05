<?php include("validasesion.php"); ?>
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Reporte de edos. financieros'); ?>
<?php
    $TituloPantalla = 'Reporte de edos. financieros';    
?>
	
	<style>
		.nav li{
			background: black;
		}
		.nav li a{
			color: white !important;
			background: #dedede !important;
			color: black !important;
			border-bottom: solid 1pt gray;
		}
		.nav li a:hover{
			color: black !important;
			background: #ffb510 !important;
			cursor: hand;
		}
		.nav li ul{
			display: none;
			padding-left: 5px;
		}
		.nav li ul li{
			background: gray !important;
			list-style-type: none;
		}
	</style>
		   
    <body>
        <div class="navmenu navmenu-default navmenu-fixed-left offcanvas" style="background:black;">
          <ul class="nav navmenu-nav" style="background:black;">
            <li>
                <a id="rptventas" type="button" style="background:black !important; color: white !important;">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                    REPORTES VENTAS
                </a>
				<ul class="rptventas">
					<!--
					<li>
						<a href="Vtasvendedores.php" id="Vtasvendedores" target="Vtasvendedores" type="button" class="list-group-item">
						<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
							Ventas por vendedor
						</a>
					</li>
					<li>
						<a href="vtasxmecanico.php" id="vtasxmecanico" target="vtasxmecanico" type="button" class="list-group-item">
						<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
							Ventas por mecanico
						</a>
					</li>
					<li>
						<a href="vtasserviciospreventivos.php" id="vtasserviciospreventivos" target="vtasserviciospreventivos" type="button" class="list-group-item">
						<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
							Servicios preventivos
						</a>
					</li>
					-->
					<li>
						<a href="vtasnetas.php" id="vtasnetas" target="vtasnetas" type="button" class="list-group-item">
						<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 
							Ventas netas
						</a>
					</li>
				</ul>
            </li>
			<li>
				<a href="salir.php"  id="edo" target="edo" type="button" style="background:black !important; color: white !important;">
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
            //cambiar clase de abierto a cerrado a iframe
            $("#principal iframe").hide();
            //cambiar clase de activo a inactivo a ventana
            $("#navbar a").attr('class').replace('vna-act', 'vna-min');
            //cambiar clase de activo a inactivo a ventana
            $(this).removeClass( 'vna-act' ).addClass( 'vna-min' );
            $( idcomplete ).hide();
        });
        
        $(document).on('click','.vna-min',function(){
            //id de ventana
            var ids = $( this ).attr("id");
            //id de iframe a partir de ventana
            var idcomplete = '#ifm'+ids;
            //cambiar clase de abierto a cerrado a iframe
            //cambiar clase de activo a inactivo a ventana
            //$("#navbar a").attr('class').replace('vna-act', 'vna-min');
			$("#navbar > a").removeClass('vna-act').addClass('vna-min');
			$("#principal iframe").hide();
			$(this).removeClass( 'vna-min' ).addClass( 'vna-act' );
            //cambiar clase de activo a inactivo a ventana
            $( idcomplete ).show();
        });
        
        $(document).on('click','.list-group-item',function(){
            //id del item menu
			$("#principal iframe").hide();
			$("#navbar > a").removeClass('vna-act').addClass('vna-min');
            var IDFRM = $( this ).attr("id");
            //id del iframe
            var modal2 = "<iframe id='ifm"+IDFRM+"' name='"+IDFRM+"' frameborder='0' class='col-sm-12'></iframe>";
            //id de la ventana
            var ventana = "<a id='"+IDFRM+"' class='vna-act'>"+IDFRM+"<button class='close' name='"+IDFRM+"'>x</button></a>";
            //dibujamos iframe dentro de div principal
            $( "#principal" ).append( modal2 );
            //dibujamos ventana en barra de tareas
            $( "#navbar" ).append( ventana );
            $("#"+IDFRM).attr('class').replace('vna-min', 'vna-act');
            $( "#ifm"+IDFRM ).addClass('ifmOpen');
			//$('.navmenu').hide();
			//$('.navmenu').attr('style','-');
        });

        $(document).on('click','ul.nav li a',function(){
            //id del item menu
			var MenuItem = $( this ).attr("id");
			if ($("."+MenuItem).is(":hidden")) {
				$("ul.nav li ul").hide();
				$("."+MenuItem).show();
			}else{
				$("."+MenuItem).hide();
			}
				
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