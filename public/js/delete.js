        let modal = $(this);
        modal.find('.modal-title #stream').text(prestacao);
        modal.find('.modal-title #level').text(nivel);
        modal.find('.modal-title #time').text(horario);
        modal.find('.modal-title #local').text(local);
        modal.find('.modal-title #estudante').text(estudante);
        modal.find('.modal-body #cat_prestacaoid').val(id);
        modal.find('.modal-body #cat_estudanteid').val(estudanteid);




        let numero = button.data('cat_prestacaonumero');
        let id = button.data('cat_prestacaoid');
        let clienteid = button.data('cat_prestacaoclienteid');
        let cliente = button.data('cat_prestacaocliente');