$('#grid').DataTable( {
    fixedHeader: true,
    dom: 'lfBrtip',            
    buttons: [
    /*
        {
            text: 'My button',
            key: {
                altKey: true,
                key: '2'
            },
            action: function ( e, dt, node, config ) {
                alert( 'Button 2 activated' );
            }
        },
        */
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
            text: 'Imprimir',
            exportOptions: {
                columns: ':visible',
                stripHtml: false,
                modifier: {
                    page: 'all'
                }
            }
        },
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todo"]],
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
    }

} );