<?php

try{ 
    
    if ($_POST){
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        $WS = new SoapClient($WebService);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->MaquinariaParaVta();
        $xml = $result->MaquinariaParaVtaResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
    }
    else{
        $WebService="http://dwh.taycosa.mx/WEB_SERVICES/DataLogs.asmx?wsdl";
        $WS = new SoapClient($WebService);
        //recibimos la respuesta dentro de un objeto
        $result = $WS->MaquinariaParaVta();
        $xml = $result->MaquinariaParaVtaResult->any;
        $obj = simplexml_load_string($xml);
        $Datos = $obj->NewDataSet->Table;
    }

} catch(SoapFault $e){
  var_dump($e);
}

    echo "<div class='table-responsive'>
        <table id='grid' class='table table-striped table-bordered table-condensed table-hover display compact' cellspacing='0' width='100%' ></table></div>";

	$arreglo = [];
	for($i=0; $i<count($Datos); $i++){
		$arreglo[$i]=$Datos[$i];
        
        if (file_exists('images/'.$Datos[$i]->Id_Maquinaria.'.jpg')) {
            //echo "El fichero $nombre_fichero existe";
            //echo "<script>alert('existe ".$Datos[$i]->Id_Maquinaria.".gif');</script>";
        } else {
            //echo "El fichero $nombre_fichero no existe";
            //$cadenaWS = $Datos[$i]->ImgFrontal;
            $imgWS = base64_decode($Datos[$i]->ImgFrontal);
            file_put_contents('images/'.$Datos[$i]->Id_Maquinaria.'.jpg', $imgWS);
        }

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
                { data: 'Id_Maquinaria' },
                { data: 'Marca' },
                { data: 'TipoMaquinaria' },
                { data: 'Modelo' },
                { data: 'HRS_MO' },
                { data: 'HRS_MO_BIT' },
                { data: 'COSTO_MO' },
                { data: 'CostoCompra' },
                { data: 'Acondicionamiento' },
                {
                    "className":      'img_maq',
                    "orderable":      true,
                    "data":           '',
                    "defaultContent": ''
                }
            ],
            columnDefs: [
                { 'title': 'Id_Maquinaria', 'targets': 0},
                { 'title': 'Marca', 'targets': 1},
                { 'title': 'Tipo', 'targets': 2},
                { 'title': 'Modelo', 'targets': 3},
                { 'title': 'Horas MO', 'targets': 4},
                { 'title': 'Horas MO Bitacora', 'targets': 5},
                { 'title': 'Costo MO', 'targets': 6},
                { 'title': 'Costo compra', 'targets': 7},
                { 'title': 'Acondicionamiento', 'targets': 8},
                { 'title': 'Imagen', 'targets': 9}
            ],
            'createdRow': function ( row, data, index ) {
                $(row).attr({ id:data.Id_Maquinaria});
                $(row).addClass('maquinaria');
                $(row).children("td.img_maq").css('background', 'url("images/'+data.Id_Maquinaria+'.jpg") center no-repeat / cover');
                $(row).children("td.img_maq").css('height', '100px');
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