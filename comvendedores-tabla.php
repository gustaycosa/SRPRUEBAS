<?php

try{ 
    
    if ($_POST){
        
        $Empresa = $_POST["CmbEmpresa"];
        $Clave =  $_POST["TxtClave"];
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

    echo "<div class='table-responsive'>
        <table id='gridvend' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' ><tfoot><tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr></tfoot></table></div>";

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
    $('#gridvend').DataTable( {
        data:datos,
        columns: [
            { data: 'MovimientoTaller' },
            { data: 'Caso' },
            { data: 'Cve_Documento' },
            { data: 'Cve_Aplico' },
            { data: 'FechaFactura' },
            { data: 'FechaVence' },
            { data: 'FechaPago' },
            { data: 'Plazo' },
            { data: 'DiaQuePago' },
            { data: 'Moneda' },   
            { data: 'Subtotal' },
            { data: 'Iva' },
            { data: 'Total' },
            { data: 'Abono' },
            { data: 'SaldoDocto' },  
            { data: 'Famila' },
            { data: 'Folio' },  
            { data: 'Id_Cliente' },  
            { data: 'Cliente' },
            { data: 'Concepto' },  
            { data: 'Articulo' },
            { data: 'Cantidad' },  
            { data: 'Descripcion' },
            { data: 'PrecioVenta' },  
            { data: 'Importe' },
            { data: 'Imp_REF' },  
            { data: 'Imp_MAQ' },
            { data: 'Imp_MO' },  
            { data: 'Imp_MOP' },  
            { data: 'Porcentage_Imp' },
            { data: 'Comi_Imp_REF' },  
            { data: 'Comi_Imp_MAQ' },
            { data: 'Comi_Imp_Vta_Contado' },         
            { data: 'Comi_Imp_MO' },
            { data: 'Comi_Imp_MOP' },  
            { data: 'Comi_Imp_TRA' }
        ],
        columnDefs: [
            { 'title': 'MOVIMIENTO', 'targets': 0},
            { 'title': 'CASO', 'targets': 1},
            { 'title': 'CLAVE DOC', 'targets': 2},
            { 'title': 'CLAVE APLICO', 'targets': 3},
            { 'title': 'FECHA FACTURA', 'targets': 4},
            { 'title': 'FECHA VENCE', 'targets': 5},
            { 'title': 'FECHA PAGO', 'targets': 6},
            { 'title': 'PLAZO', 'targets': 7},
            { 'title': 'DIA QUE PAGO', 'targets': 8},
            { 'title': 'MONEDA', 'targets': 9},
            { 'title': 'SUBTOTAL', 'targets': 10},
            { 'title': 'IVA', 'targets': 11},
            { 'title': 'TOTAL', 'targets': 12},
            { 'title': 'ABONO', 'targets': 13},
            { 'title': 'SALFO DOC', 'targets': 14},
            { 'title': 'FAMILIA', 'targets': 15},
            { 'title': 'FOLIO', 'targets': 16},
            { 'title': 'ID CLIENTE', 'targets': 17},
            { 'title': 'CLIENTE', 'targets': 18},
            { 'title': 'CONCEPTO', 'targets': 19},
            { 'title': 'ARTICULO', 'targets': 20},
            { 'title': 'CANTIDAD', 'targets': 21},
            { 'title': 'DESCRIPCION', 'targets': 22},
            { 'title': 'PRECIO VENTA', 'targets': 23},
            { 'title': 'IMPORTE', 'targets': 24},
            { 'title': 'IMP REF', 'targets': 25},
            { 'title': 'IMP MAQ', 'targets': 26},
            { 'title': 'IMP MO', 'targets': 27},
            { 'title': 'IMP MOP', 'targets': 28},
            { 'title': 'PORCENTAJE IMP', 'targets': 29},
            { 'title': 'COMISION IMP REF', 'targets': 30},
            { 'title': 'COMISION IMP MAQ', 'targets': 31},
            { 'title': 'COMISION IMP CONT', 'targets': 32},
            { 'title': 'COMISION IMP MO', 'targets': 33},
            { 'title': 'COMISION IMP MOP', 'targets': 34},
            { 'title': 'COMISION IMP TRA', 'targets': 35}
        ],
        'createdRow': function ( row, data, index ) {
            $(row).attr({ id:data.id_vendedor});
            $(row).addClass('vendedor');
        }, 
        fixedHeader: true,
        dom: 'lfBrtip',            
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
            }
        },
        scrollY:        '50vh',
        scrollX:        'true',
        scrollCollapse: true,
        paging:         false
    } );
} );
</script>