$(document).ready(function(){
    $('#tblRutas').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        columnDefs: [
            { "width": "25%", "targets": [0, 1, 2] },
            { "width": "20%", "targets": 3 }
        ],
        createdRow: function(row, data, index){
            $(row).find('.btn-danger').on('click', function(){
                alertify.confirm('¡Advertencia!', '¿Está seguro de eliminar el registro?',
                    function(){
                        alertify.success("Registro eliminado exitosamente");
                    },
                    function(){ }
                );
            });
        }
    });
});