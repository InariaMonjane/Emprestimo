/*Pagar pretacao*/
$(function(){
    $('#pagarPrestacao').on('show.bs.modal', function(event){
        let button = $(event.relatedTarget);
        let prestacao = button.data('cat_prestacaovalor');
        let numero = button.data('cat_prestacaonumero');
        let multa = button.data('cat_prestacaomulta');
        let id = button.data('cat_prestacaoid');
        let valorRecebido = parseFloat(prestacao)+parseFloat(multa);
        let modal = $(this);
        modal.find('.modal-body #valor').text(valorRecebido);
        modal.find('.modal-body #numero').text(numero);
        modal.find('.modal-body #prestacao_id').val(id);
        modal.find('.modal-body #multa_id').val(multa);
    });

});