
<!DOCTYPE html>
<html class="no-js">

<?php include("Funciones.php"); ?>
<?php echo Cabecera('Reporte de edos. financieros'); ?>
<?php
$TituloPantalla = 'Reporte de edos. financieros';    

$WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";

$Columnas = array("Modulo","Grupo","forma","Descripcion","InsertarDatos","ActualizarDatos","EliminarDatos","LeerDatos");//COLUMNAS 
    
$parametros = array();
$parametros['sPerfil'] = $perfil ;//'JEFE_VENTAS';
$parametros['sModulo'] = 'DWH';
$parametros['sTipoPerfil'] = $tipoperfil ;//'INCLUYENTE';
$WS = new SoapClient($WebService, $parametros);
$result = $WS->AccesosMenu($parametros);
$xml = $result->AccesosMenuResult->any;
$obj = simplexml_load_string($xml);
$Datos = $obj->NewDataSet->Table;

    echo '<body style="background: url(../img/LOGOTAYCO.jpg) center no-repeat fixed gray;">
        <div id="navmenu" style="background:black;">
          <ul class="nav navmenu-nav" style="background:black;">';
    $BANDERA = '';

    for($i=0; $i<count($Datos); $i++){
            
            if(strcmp($Datos[$i]->$Columnas[1],$BANDERA) !== 0 && $i==0 ){
		      echo '<li><a id="'.$Datos[$i]->$Columnas[1].'">'.$Datos[$i]->$Columnas[1].'</a><ul class="'.$Datos[$i]->$Columnas[1].'">';
                echo '<li><a href="'.$Datos[$i]->$Columnas[2].'.php" id="'.$Datos[$i]->$Columnas[2].'" target="'.$Datos[$i]->$Columnas[2].'" class="list-group-item">'.$Datos[$i]->$Columnas[3].'</a></li>'; 
                $BANDERA = $Datos[$i]->$Columnas[1];
            }elseif( strcmp($Datos[$i]->$Columnas[1],$BANDERA) !== 0){
                echo '</ul></li><li id="a'.$i.'"><a id="'.$Datos[$i]->$Columnas[1].'" type="button">
                    '.$Datos[$i]->$Columnas[1].'</a><ul class="'.$Datos[$i]->$Columnas[1].'">';
                echo '<li><a href="'.$Datos[$i]->$Columnas[2].'.php" id="'.$Datos[$i]->$Columnas[2].'" target="'.$Datos[$i]->$Columnas[2].'" class="list-group-item">'.$Datos[$i]->$Columnas[3].'</a></li>'; 
                $BANDERA = $Datos[$i]->$Columnas[1];
            }else{
                echo '<li id="'.$i.'"><a href="'.$Datos[$i]->$Columnas[2].'.php" id="'.$Datos[$i]->$Columnas[2].'" target="'.$Datos[$i]->$Columnas[2].'" class="list-group-item">'.$Datos[$i]->$Columnas[3].'</a></li>'; 
            }
    }
				echo '   
			</ul></li>
            <li><a href="salir.php" type="button" style="background:black !important; color: white !important;">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar sesión
            </a>
          </ul>';

        echo '</div>
        <div class="navbar navbar-default navbar-fixed-top">
          <button  id="edo" target="edo"  type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body" style=" background: #337ab7;">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>';
        echo '<div id="principal" class="container-fluid"></div></body>';

        include("barratareas.php");    
        echo Script();
    
 ?>
    <script type="text/javascript"> 
        var contador = 0;
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
            
			$("#principal iframe").hide();
			$("#navbar > a").removeClass('vna-act').addClass('vna-min');
            var IDFRM = $( this ).attr("id");
            contador = contador + 1;
            var modal2 = "<iframe id='ifm"+IDFRM+"_"+contador+"' name='"+IDFRM+"' frameborder='0' class='col-sm-12'></iframe>";
            var ventana = "<a id='"+IDFRM+"_"+contador+"' class='vna-act'>"+IDFRM+"<button class='close' name='"+IDFRM+"_"+contador+"'>x</button></a>";
            $( "#principal" ).append( modal2 );
            $( "#navbar" ).append( ventana );
            $("#"+IDFRM+"_"+contador).attr('class').replace('vna-min', 'vna-act');
            $( "#ifm"+IDFRM+"_"+contador ).addClass('ifmOpen');
            
            $("#navmenu").hide();
            $("#navmenu").css("left","-300px");
            $("#edo").css("left","0px");
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
        
        $(document).on('click','#principal',function(){
                $("#navmenu").hide();
                $("#navmenu").css("left","-300px");
                $("#edo").css("left","0px");
        });
        
        $(document).on('click','#edo',function(){
			if ($("#navmenu").is(":hidden")) {
                
                $("#navmenu").show();
				$("#navmenu").css("left","0px");
                $("#edo").css("left","300px");
                /*
                $("#navmenu").animate({
                    left: "0",
                }, 500, function() {
                    left: "-300"
                });*/
			}else{
                
                $("#navmenu").hide();
                $("#navmenu").css("left","-300px");
                $("#edo").css("left","0px");
                /*
                $("#navmenu").animate({
                    left: "-300px",
                }, 500, function() {
                    left: "0"
                });*/
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