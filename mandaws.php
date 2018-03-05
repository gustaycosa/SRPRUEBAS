<?php

    require_once('lib/nusoap.php');
    //$cliente = new nusoap_client('http://taycosa.mx/servicio.php');
    //$resultado = $cliente->call('calculadora', array('x' => '3', 'y' => 4, 'operacion' => 'multiplica'));

    $cliente = new nusoap_client('http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl');
    $resultado = $cliente->call('ReporteAsistencias', array('De' => date('Y-m-d'), 'A' => date('Y-m-d')));

    echo $resultado;

?>