<?php

require_once('lib/nusoap.php');

ini_set("soap.wsdl_cache_enabled", "0");

$Columnas = array("id_empresa","Id_Sucursal","Id_Vendedor","MovimientoTaller","Caso","Cve_Documento","Cve_Aplico","FechaFactura","FechaVence","FechaPago","Plazo","DiaQuePago","Moneda","Subtotal","Iva","Total","Abono","SaldoDocto","Famila","Folio","Id_Cliente","Cliente","Concepto",
"Articulo","Cantidad" ,"Descripcion","PrecioVenta" ,"Importe" ,"Imp_REF" ,"Imp_MAQ" ,"Imp_MO" ,"Imp_MOP" ,"Porcentage_Imp" ,"Comi_Imp_REF" ,"Comi_Imp_MAQ" ,"Comi_Imp_Vta_Contado" ,"Comi_Imp_MO" ,"Comi_Imp_MOP" ,"Comi_Imp_TRA");//COLUMNAS GRID
//$De = date('Y-m-d');
//$A = date('Y-m-d');

try{ 
    
    if ($_POST){
        
        $Empresa = $_POST["CmbEmpresa"];
        $Clave =  $_POST["Cmbvendedores"];
        $Moneda =  $_POST["CmbMoneda"];
        $De = $_POST["Fini"];
        $A =  $_POST["Ffin"]; 

        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        //parametros de la llamada
        $parametros = array();
        $parametros['Id_Empresa'] = $Empresa;
        $parametros['Clave'] = $Clave;
        $parametros['Moneda'] = $Moneda;
        $parametros['FechaIni'] = $De;
        $parametros['FechaFin'] = $A;
        //ini_set("soap.wsdl_cache_enabled", "0");
        //Invocación al web service
        $WS = new SoapClient($WebService, $parametros);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->ComisionesVendedor($parametros);
        $xml = $result->ComisionesVendedorResult->any;

        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
//echo $xml;
    }
    else{}
} catch(SoapFault $e){
  var_dump($e);
}

echo "<div class='table-responsive'><table id='grid' class='table table-striped table-bordered table-condensed table-hover' cellspacing='0' width='100%' style='white-space: nowrap;'>
	 	<thead><tr>"; 
		
			for($i=0; $i<count($Columnas); $i++){
		  		echo "<th>".$Columnas[$i]."</th>";
			}

	  	echo "</tr></thead>
	 	<tfoot><tr>";

			for($i=0; $i<count($Columnas); $i++){
		  		echo "<th>".$Columnas[$i]."</th>";
			}
	  	
 echo "</tr></tfoot><tbody>";
    
 for($i=0; $i<count($Datos); $i++){
    echo "<tr>";
    for($j=0; $j<count($Columnas); $j++){
        echo "<td width='auto'>".$Datos[$i]->$Columnas[$j]."</td>";
    } 
    echo "</tr>";
 } 
    
  echo "</tbody></table></div>";

?>

<script type="text/javascript"> 
        
    $('#grid').DataTable( {
        fixedHeader: true,
        dom: 'lfBrtip',            
        buttons: [
            {
                extend: 'colvis',
                columns: ':not(:first-child)',
                collectionLayout: 'fixed two-column',
                text: 'Ocultar columnas'
            },
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
                footer:'true',
                customize: function ( doc ) {
                    // Splice the image in after the header, but before the table
                    doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'center',
                        <?php include("ImgHeader.php"); ?>
                    } );
                    // Data URL generated by http://dataurl.net/#dataurlmaker
                },
                filename: 'GridN',
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
                footer:'true',
                filename: 'GridN',
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
                message: 'PDF creado desde el sistema\n en linea del tayco.',
                footer:'true',
                text: 'XLS',
                filename: 'GridN',
                extension: '.xlsx', 
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'all'
                    }
                }
            },
            {
                extend: 'print',
                message: 'PDF creado desde el sistema\n en linea del tayco.',
                footer:'true',
                text: 'Imprimir',
                exportOptions: {
                    columns: [ 1, 4, 6, 8, 11, 21],
                    stripHtml: false,
                    modifier: {
                        page: 'all'
                    }
                }
            },
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [[-1, 10, 25, 50], ["Todo", 10, 25, 50]],
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
        "scrollY": '50vh',
        "scrollX": true,
        "paging": false
        },
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            //var api2 = this.api(), data;
            
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over all pages
            total = api
                .column( 15 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over this page
            pageTotal = api
                .column( 15, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column( 15 ).footer() ).html(
                '$'+ total.toFixed(2) +' total'
            );
            
            var COMIR = this.api(), data;
            var COMIM = this.api(), data;
            var COMIVC = this.api(), data;
            var COMIMO = this.api(), data;
            var COMIMOP = this.api(), data;
            var COMITRA = this.api(), data;
            
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over all pages
            total33 = COMIR
                .column( 33 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $( api.column( 33 ).footer() ).html(
                '$'+ total33.toFixed(2) +' total'
            );
            
            // Total over all pages
            total34 = COMIM
                .column( 34 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $( api.column( 34 ).footer() ).html(
                '$'+ total34.toFixed(2) +' total'
            );
            
            // Total over all pages
            total35 = COMIVC
                .column( 35 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $( api.column( 35 ).footer() ).html(
                '$'+ total35.toFixed(2) +' total'
            );
            
            // Total over all pages
            total36 = COMIMO
                .column( 36 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $( api.column( 36 ).footer() ).html(
                '$'+ total36.toFixed(2) +' total'
            );
            
            // Total over all pages
            total37 = COMIMOP
                .column( 37 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $( api.column( 37 ).footer() ).html(
                '$'+ total37.toFixed(2) +' total'
            );
            
            // Total over all pages
            total38 = COMITRA
                .column( 38 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
            totalFinal= total33 + total34 + total35 + total36 + total37 + total38 
            // Update footer
            $( api.column( 38 ).footer() ).html(
                '$'+ total38 +' total <br>' 
                + '$' + totalFinal.toFixed(2) + ' total final'
            );
            
            $("#TotalComisiones").val('$' + totalFinal.toFixed(2) + ' COMISION TOTAL');
        }

    } );


</script>