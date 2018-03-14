<?php

try{ 
    
    if ($_POST){
        
        $Empresa = $_POST["CmbEmpresa"];
        $A =  $_POST["Ffin"]; 
        $De = $_POST["Fini"];
        $Cliente =  $_POST["TxtCliente"]; 
        $Moneda =  $_POST["CmbMoneda"]; 

        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['sId_Empresa'] = 'TAYCOSA';
        $parametros['dtFechaIni'] = $De;
        $parametros['dtFechaFin'] = $A;
        $parametros['sId_Cliente'] = $Cliente;
        $parametros['sMoneda'] = $Moneda;
        //ini_set("soap.wsdl_cache_enabled", "0");
        //Invocación al web service
        $WS = new SoapClient($WebService, $parametros);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->Inf_Cli_EstadoCuentaGral($parametros);
        $xml = $result->Inf_Cli_EstadoCuentaGralResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

echo "<div class='table-responsive'><table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' ></table></div>";

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
/*
			$sGridNomb = '#grid';
			$sWsNomb = 'cliedoctagral';
            $aColumnas = array("FECHA","CVE_DOCUMENTO","CARGO","ABONO","SALDOCLIENTE","CONCEPTO","REFERENCIA","FECHAVENCE","SALDODOCTO","SALDOMOVTO","DIASVENCE","SUBTOTAL","IMPIVA","DESCTO","TOTAL","CVEDOCTO","TIPODOCTO","FUM","ID_USUARIO");
            $aTitulos = array("FECHA","CVE_DOCUMENTO","CARGO","ABONO","SALDOCLIENTE","CONCEPTO","REFERENCIA","FECHAVENCE","SALDODOCTO","SALDOMOVTO","DIASVENCE","SUBTOTAL","IMPIVA","DESCTO","TOTAL","CVEDOCTO","TIPODOCTO","FUM","ID_USUARIO");
			echo GrdRptShort($sGridNomb,$sWsNomb,$aColumnas,$aTitulos);
            */
		?>
$(document).ready(function() {
         var table = $('#grid').DataTable({
            data:datos,
            columns: [
                {
                    "className":      'img_maq',
                    "orderable":      true,
                    "data":           '',
                    "defaultContent": ''
                },
                { data: 'FECHA' },
                { data: 'CVE_DOCUMENTO' },
                { data: 'CARGO' },
                { data: 'ABONO' },
                { data: 'SALDOCLIENTE' },
                
                { data: 'CONCEPTO' },
                { data: 'REFERENCIA' },
                { data: 'FECHAVENCE' },
                { data: 'SALDODOCTO' },
                { data: 'SALDOMOVTO' },
                
                { data: 'DIASVENCE' },
                { data: 'SUBTOTAL' },
                { data: 'IMPIVA' },
                { data: 'DESCTO' },
                { data: 'TOTAL' },
                
                { data: 'CVEDOCTO' },
                { data: 'TIPODOCTO' },
                { data: 'FUM' }
            ],
            columnDefs: [
                { 'title': 'FECHA', 'targets': 0},
                { 'title': 'CVE DOCUMENTO', 'targets': 1},
                { 'title': 'CARGO', 'targets': 2},
                { 'title': 'ABONO', 'targets': 3},
                { 'title': 'SALDO', 'targets': 4},
                
                { 'title': 'CONCEPTO', 'targets': 5},
                { 'title': 'REFERENCIA', 'targets': 6},
                { 'title': 'FECHA VENCE', 'targets': 7},
                { 'title': 'SALDO DOCTO', 'targets': 8},
                { 'title': 'SALDO MOVTO', 'targets': 9},
                
                { 'title': 'DIAS VENCE', 'targets': 10},
                { 'title': 'SUBTOTAL', 'targets': 11},
                { 'title': 'IMP IVA', 'targets': 12},
                { 'title': 'DESCUENTOS', 'targets': 13},
                { 'title': 'TOTAL', 'targets': 14},
                
                { 'title': 'CLAVE DOCTO', 'targets': 15},
                { 'title': 'TIPO DOCTO', 'targets': 16},
                { 'title': 'FUM', 'targets': 17}
            ],
            'createdRow': function ( row, data, index ) {
            },
            dom: 'lfBrtip',    
            paging: false,
            searching: true,
            ordering: false,
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
                }
            },
            'scrollY':        '60vh',
            'scrollCollapse': true,
            'paging':         false
        } );
    } );
    </script>
    </script>
            
