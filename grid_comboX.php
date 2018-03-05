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
                    message: 'Copiado!.',
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
                    filename: 'DescargaGrid',
                    extension: '.pdf',       
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        }
                    }
                },
                {
                    extend: 'excel',
                    message: 'PDF creado desde el sistema\n en linea del tayco.',
                    text: 'XLS',
                    filename: 'DescargaGrid',
                    extension: '.xlsx', 
                    exportOptions: {
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
                    "sSortAscending":  "",
                    "sSortDescending": ""
                }
            },
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;

                    var select = $('<select><option value="Selecciona">Selecciona</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j )
                        if(j>1){
                            select.append( '<option value="'+d+'" width="auto">'+d+'</option>' )
                        }
                        else{

                        }
                    } );
                } );
            },
            "scrollY": '50vh',
            "scrollX": true,
            "paging": true,
            "order": [[ 1, "desc" ]]
        } );