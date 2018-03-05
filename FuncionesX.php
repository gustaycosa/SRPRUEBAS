<?php
    function CmbGenerico($sClave,$sWhere){
        try{ 
            $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
            //parametros de la llamada
            
            $parametros = array();
            $parametros['sClave'] = $sClave;
            $parametros['sWhere'] = $sWhere;
            //Invocación al web service
            $WS = new SoapClient($WebService,$parametros);
            //recibimos la respuesta dentro de un objeto
            $result = $WS->CBO_GENERICO_ANT($parametros);
            $xml = $result->CBO_GENERICO_ANTResult->any;
            $obj = simplexml_load_string($xml);
            $Datos = $obj->NewDataSet->Table;
            
        } catch(SoapFault $e){
          var_dump($e);
        }
        $Cmb = "<select id='Cmb".$sClave."' name='Cmb".$sClave."' class='col-sm-12 form-group'><option value='0'>TODO (".$sClave.")</option>"; 
         for($i=0; $i<count($Datos); $i++){
            $Cmb = $Cmb."<option value='".$Datos[$i]->C1."'>".$Datos[$i]->C2."</option>";
        }
        $Cmb = $Cmb."</select>";
        return $Cmb;
    }
    function CmbCualquieras($sID,$sNombre,$sTabla){
        try{ 
            $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
            //parametros de la llamada
            $parametros = array();
            $parametros['sID'] = $sID;
            $parametros['sNombre'] = $sNombre;
            $parametros['sTabla'] = $sTabla;
            //Invocación al web service
            $WS = new SoapClient($WebService,$parametros);
            //recibimos la respuesta dentro de un objeto
            $result = $WS->CmbCualquiera($parametros);
            $xml = $result->CmbCualquieraResult->any;
            $obj = simplexml_load_string($xml);
            $Datos = $obj->NewDataSet->Table;
        } catch(SoapFault $e){
          var_dump($e);
        }
        $Cmb = "<select id='Cmb".$sTabla."' name='Cmb".$sNombre."' class='col-sm-12 form-group'><option value='0'>TODO (".$sTabla.")</option>"; 
         for($i=0; $i<count($Datos); $i++){
            $Cmb = $Cmb."<option value='".$Datos[$i]->$sID."'>".$Datos[$i]->$sNombre."</option>";
        }
        $Cmb = $Cmb."</select>";
        return $Cmb;
    }

    function Cabecera(){
        $ptr = $ptr.'<head>
            <title></title>
            <meta charset=utf-8>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <meta name="description" content="" />
            <meta name="keywords" content="" />
            <meta name="author" content="TAYCO SA DE CV" />
            <link rel="stylesheet" type="text/css" href="css/normalize.css" />
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"  />
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.0/css/fixedHeader.dataTables.min.css" />
            <link rel="stylesheet" type="text/css" href="css/ThemeBlue.css"  />
            <link rel="shortcut icon" href="images/favicon.ico">
        </head>';
        return $ptr;
    }

    function Script(){
        $ptr = '<script type="text/javascript"  src="js/jquery.min.js"></script>
        <script type="text/javascript"  src="js/bootstrap.js"></script>
        <script type="text/javascript"  src="js/validaciones.js"></script>
        <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>-->
        <script src="js/jeditable.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.0/js/dataTables.fixedHeader.min.js"></script>
        <!--<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.colVis.min.js"></script>';
        return $ptr;
    }

    function Barra(){
        $ptr = '<nav id="navbar" class="navbar navbar-default "> 
            <div class="navbar-header"> 
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false"> 
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> <span class="icon-bar"></span> 
                </button> 
                <a class="navbar-brand logoTayco" href="default"></a> 
            </div>  
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9"> 
            <ul class="nav navbar-nav AntiFL"> 
                <li class="active"><a href="default">Reporteador TAYCOSA</a></li> 

                <!--<li><a href="#InxServicios">Servicios</a></li> 
                <li><a href="http://dwh.taycosa.mx/dwh/login.aspx" target="blank">DWH</a></li>
                --> 
            <li id="fat-menu1" class="dropdown"> 
            <a id="drop5" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Pantallas <span class="caret"></span> </a> 
                <ul class="dropdown-menu" aria-labelledby="drop5"> 
                    <li><a href="Gobernador.php" type="button" class="list-group-item">Usuarios</a></li>
                    <li><a href="Existencias.php" type="button" class="list-group-item">Existenacias</a></li>
                    <li><a href="Asistencias.php" type="button" class="list-group-item">Asistencias</a></li>
                    <li><a href="Gobernador.php" type="button" class="list-group-item">Usuarios</a></li>
                </ul> 
            </li> 
            <li id="fat-menu2" class="dropdown"> 
            <a id="drop5" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Bienvenido <?php echo $_SESSION["NombreUsuario"] ?><span class="caret"></span> </a> 
                <ul class="dropdown-menu" aria-labelledby="drop5"> 
                    <li><a href="salir.php">Cerrar sesión</a></li> 
                </ul> 
            </li> 
            </ul></div> 
        </nav>';
        return $ptr;
    }
?>