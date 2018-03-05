<?php

require_once('lib/nusoap.php');
include("Funciones.php"); 
ini_set("soap.wsdl_cache_enabled","MES ACTUAL","MES ANTERIOR","ACUMULADO ACT.","ACUMULADO ANT.","TF");

$titulos = array("CONCEPTO","MES ACTUAL","MES ANTERIOR","ACUMULADO ACT.","ACUMULADO ANT.");

$ConceptoDivision = '';
$Empresa = $_SESSION['Empresa'];
$Suma = 0;
try{ 
    
    if ($_POST){
        
        $Ejercicio =  $_POST["TxtEjercicio"]; 
        $Mes =  $_POST["TxtMes"]; 
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['Empresa'] = 'TAYCOSA';
        $parametros['Mes'] = $Mes;
        $parametros['Ejercicio'] = $Ejercicio;
        //ini_set("soap.wsdl_cache_enabled", "0");
        //Invocación al web service
        $WS = new SoapClient($WebService, $parametros);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->edobalancegeneral($parametros);
        $xml = $result->edobalancegeneralResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

    echo "<div class='table-responsive'>
        <table id='grid' class='table table-condensed display compact nowrap' cellspacing='0' width='100%'></table></div>";

$arreglo = [];
for($i=0; $i<count($Datos); $i++){
    $arreglo[$i]=$Datos[$i];
}
        //print_r($arreglo);
        //echo number_format($Suma, 2, ',', ' ');

?>

    <script type="text/javascript"> 
        var datos = 
        <?php 
            echo json_encode($arreglo);
        ?>
        ;
        $(document).ready(function() {

            var table = $('#grid').DataTable({
                data:datos,
                columns: [
                    { data: "ConceptoCtb" },
                    { data: "Mes_Actual" },
                    { data: "Mes_Anterior" },
                    { data: "Acumulado_Act" },
                    { data: "Acumulado_Ant" }
                ],
			    columnDefs: [
				    { "title": "CONCEPTO CONTABLE", "targets": 0},
					{ "title": "MES ACTUAL", "targets": 1},
					{ "title": "MES ANTERIOR", "targets": 2},
					{ "title": "ACUM.ACTUAL", "targets": 3},
					{ "title": "ACUM.ANTERIOR", "targets": 4}
			    ],
                "createdRow": function ( row, data, index ) {
					$(row).attr({ id:data.Id_ConceptoCtb});
					$(row).addClass(data.REF);
                    if ( data.TF == 'T1' ) {
                        $(row).addClass('T1');
                    }
                    else if ( data.TF == 'T2' ) {
                        $(row).addClass('T2');
                    }
                    else if ( data.TF == 'T3' ) {
                        $(row).addClass('T3');
                    }
                    else if ( data.TF == 'N' ) {
                        $(row).addClass('N');
                        $(row).hide();
                    }
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
                        filename: '".$sNombre."',
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
                        filename: '".$sNombre."',
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
                        filename: '".$sNombre."',
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
                'scrollY': '300',
				'scrollCollapse': true,
                'scrollX': true,
                'paging': false,
                'responsive': true,
            } );
            
        } );
        //FUNCION DE PLATILLOS MENUS
        $(function(){

            $('#grid tr').click(function() {
				var ids = $( this ).attr("id");
                if ($('.'+ids).css("display") != "none" ) {
                    $('.'+ids).hide(); 
                }else{
                    $('.'+ids).show(); 
                }
            });
        });
    </script>