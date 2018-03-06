<?php

try{ 
    
    if ($_POST){
        $Ejercicio =  $_POST["TxtEjercicio"]; 
        $Mes =  $_POST["TxtMes"]; 
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        $parametros = array();
        $parametros['Empresa'] = 'TAYCOSA';
        $parametros['Mes'] = $Mes;
        $parametros['Ejercicio'] = $Ejercicio;
        $WS = new SoapClient($WebService, $parametros);
        $result = $WS->tallermecanicoshoras($parametros);
        $xml = $result->tallermecanicoshorasResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
    }
    else{

    }

} catch(SoapFault $e){
  var_dump($e);
}

    echo "<div class='table-responsive'>
        <table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' ></table></div>";

	$arreglo = [];
	for($i=0; $i<count($Datos); $i++){
		$arreglo[$i]=$Datos[$i];
	}

?>

     <script type="text/javascript"> 
        var datos = 
        <?php 
            echo json_encode($arreglo);
        ?>
		;
		<?php
/*
			$sGridNomb = '#gridfact';
			$sWsNomb = 'vtas_netasfact';
			$aColumnas = array("Fecha","Id_Sucursal","Serie","Folio","Id_cliente","Nombre","Concepto","Total");
			$aTitulos =  array("Fecha","Id_Sucursal","Serie","Folio","Id_cliente","Nombre","Concepto","Total");
			echo GrdRptShort($sGridNomb,$sWsNomb,$aColumnas,$aTitulos);
            */
		?>

 $(document).ready(function() {
         var table = $('#grid').DataTable({
            data:datos,
            columns: [
                { data: 'Cve_Empleado' },
                { data: 'Nombre' },
                { data: 'HORASREALES' },
                { data: 'HORASFACTURABLES' },
                {
                    "className":      'btn_SERVICIOTALLER',
                    "orderable":      false,
                    "data":           'SERVICIOTALLER',
                    "defaultContent": ''
                },
                {
                    "className":      'btn_MANTENIMIENTO',
                    "orderable":      false,
                    "data":           'MANTENIMIENTO',
                    "defaultContent": ''
                },
                {
                    "className":      'btn_PERMISOS',
                    "orderable":      false,
                    "data":           'PERMISOS',
                    "defaultContent": ''
                },
                {
                    "className":      'btn_CAPACITACION',
                    "orderable":      false,
                    "data":           'CAPACITACION',
                    "defaultContent": ''
                },
                {
                    "className":      'btn_TRASLADOS',
                    "orderable":      false,
                    "data":           'TRASLADOS',
                    "defaultContent": ''
                },
                {
                    "className":      'btn_APOYODEMO',
                    "orderable":      false,
                    "data":           'APOYODEMO',
                    "defaultContent": ''
                },
                {
                    "className":      'btn_APOYOTALLER',
                    "orderable":      false,
                    "data":           'APOYOTALLER',
                    "defaultContent": ''
                }
            ],
            columnDefs: [
                { 'title': 'Clave', 'targets': 0},
                { 'title': 'Nombre Mecanico', 'targets': 1},
                { 'title': 'Hrs Reales', 'targets': 2},
                { 'title': 'Hrs Facturables', 'targets': 3},
                { 'title': 'Hrs Servicio', 'targets': 4},
                { 'title': 'Hrs Mtto', 'targets': 5},
                { 'title': 'Hrs Permisos', 'targets': 6},
                { 'title': 'Hrs Capacitacion', 'targets': 7},
                { 'title': 'Hrs Traslados', 'targets': 8},
                { 'title': 'Hrs ApoyoDemo', 'targets': 9},
                { 'title': 'Hrs ApoyoTaller', 'targets': 10}
            ],
            'createdRow': function ( row, data, index ) {
                $(row).attr({ id:data.Cve_Empleado,nombre:data.Nombre});
                //$(row).addClass('mecanico');
            },
            dom: 'lfBrtip',    
            paging: false,
            searching: true,
            ordering: true,
            buttons: [
                {
                    extend: 'copy',
                    message: 'PDF created by PDFMake with Buttons for DataTables.',
                    text: 'Copiar',
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        }
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    customize: function ( doc ) {
                        // Splice the image in after the header, but before the table
                        doc.content.splice( 1, 0, {
                            margin: [ 0, 0, 0, 12 ],
                            alignment: 'center'
                        } );
                        // Data URL generated by http://dataurl.net/#dataurlmaker
                    },
                    filename: 'vtas_netasfact',
                    extension: '.pdf',       
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'all'
                        }
                    }
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    header:'true',
                    filename: 'vtas_netasfact',
                    extension: '.csv',       
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'all'
                        }
                    }
                },
                {
                    extend: 'excel',
                    message: 'PDF creado desde el sistema en linea del tayco.',
                    text: 'XLS',
                    filename: 'vtas_netasfact',
                    extension: '.xlsx', 
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'all'
                        }
                    },
                    customize: function( xlsx ) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row:first c', sheet).attr( 's', '42' );
                    }
                },
                {
                    extend: 'print',
                    message: 'PDF creado desde el sistema en linea del tayco.',
                    text: 'Imprimir',
                    exportOptions: {
                        stripHtml: false,
                        modifier: {
                            page: 'all'
                        }
                    }
                },
            ],
            'pagingType': 'full_numbers',
            'lengthMenu': [[-1], ['Todo']],
            'language': {
                'sProcessing':    'Procesando...',
                'sLengthMenu':    'Mostrar _MENU_ registros',
                'sZeroRecords':   'No se encontraron resultados',
                'sEmptyTable':    'Ningún dato disponible en esta tabla',
                'sInfo':          'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                'sInfoEmpty':     'Mostrando registros del 0 al 0 de un total de 0 registros',
                'sInfoFiltered':  '(filtrado de un total de _MAX_ registros)',
                'sInfoPostFix':   '',
                'sSearch':        'Buscar:',
                'sUrl':           '',
                'sInfoThousands':  ',',
                'sLoadingRecords': 'Cargando...',
                'oPaginate': {
                    'sFirst':    'Primero',
                    'sLast':    'Último',
                    'sNext':    'Siguiente',
                    'sPrevious': 'Anterior'
                },
                'oAria': {
                    'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                    'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                },
            'paging': false,
            'responsive': true
            }
        } );
    } );
    </script>