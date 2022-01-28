/*Pagar pretacao*/
$(function(){
    $('#pagarPrestacao').on('show.bs.modal', function(event){
        let button = $(event.relatedTarget);
        let prestacao = button.data('cat_prestacaovalor');
        let numero = button.data('cat_prestacaonumero');
        let id = button.data('cat_prestacaoid');
        let modal = $(this);
        modal.find('.modal-body #valor').text(prestacao);
        modal.find('.modal-body #numero').text(numero);
        modal.find('.modal-body #prestacao_id').val(id);
    });
});