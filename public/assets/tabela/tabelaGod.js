$(document).ready( function () {
    $('.tabela').DataTable({
      ordering: true,
      language: {
        processing:     "Processando...",
        search:         "Procurar:",
        lengthMenu:       "Mostrando _MENU_ linhas",
        info:           "Mostrando _START_ à _END_ linhas de _TOTAL_ linhas",
        infoEmpty:      "A lista está vazia",
        infoFiltered:   "filtrando _MAX_ de linhas totais)",
        infoPostFix:    "",
        loadingRecords: "Carregando linhas...",
        zeroRecords:    "Sem dados",
        emptyTable:     "Sem dados",
        paginate: {
            first:      "Primeiro",
            previous:   "Voltar",
            next:       "Próximo",
            last:       "Último"
        }
      },
      dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                className: 'btn-secondary',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                messageTop: 'Impressão da lista',
                text: 'Imprimir',
                className: 'btn-secondary',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'colvis',
                text: 'Colunas',
                className: 'btn-secondary',
                exportOptions: {
                    columns: ':visible',
                    className: 'btn-secondary'
                }
            }
        ],
    });
    $('.tabela').addClass('table table-striped table-bordered table-hover table-sm');
} );