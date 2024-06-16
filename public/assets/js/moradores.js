$(function() {
    
    drawTable();

    $('#moradores tbody').find('tr').each(function() {
        
        var idMorador = $(this).find('.excluir_morador').data('id_morador');
        
        $(`#excluir_${idMorador}`).click(function() {
            
            Swal.fire({
                title: 'Deseja excluir morador?',
                showDenyButton: true,
                denyButtonText: 'Cancelar',
                icon: 'warning',
                confirmButtonText: 'Sim, excluir',
            }).then((result) => {

                if(result.isConfirmed) {     
                    $.ajax({
                        url: `/morador/excluir/${idMorador}`,
                        type: 'POST',
                        dataType: 'JSON',
                        contentType: 'application/json',
                        beforeSend: function(response) {
                            Swal.fire({
                                title: "Aguarde!",
                                text: "Excluindo Evento",
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                    timer.textContent = `${Swal.getTimerLeft()}`;
                                    }, 100);
                                },      
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }                                
                            });
                        },
                        success: function(response) {
                            
                            if(response.success) {
                                Swal.fire('Sucesso!', `Morador excluído com sucesso!`, 'success');
                            }

                            location.reload();
                        }
                    });
                }
            });
        });
    });
});

function drawTable() {
    let table = new DataTable('#moradores', {
        responsive: true,
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": ">>",
                "sPrevious": "<<",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            },
            "buttons": {
                "copy": "Copiar",
                "copyTitle": "Cópia bem-sucedida",
                "copySuccess": {
                    "1": "Uma linha copiada com sucesso",
                    "_": "%d linhas copiadas com sucesso"
                }
            }
        }
    });
}