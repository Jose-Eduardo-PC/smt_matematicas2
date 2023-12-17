function showTable(url, columns) {
    $('#table').DataTable({
        "responsive": {
            details: {
                type: 'column',
                target: -1
            }
        },
        "processing": true,
        "serverSide": true,
        "ajax": url,
        "columns": columns,
        columnDefs: [{
            className: 'control',
            orderable: false,
            targets: -1
        }],
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
                "next": ">>",
                "previous": "<<"
            }
        },
    });
}
