jQuery(document).ready(function () {

    var loadContas = function () {
        $.ajax({
            method: "POST",
            url: APP_URL + "/contas/load_contas",
            dataType: 'html',
            beforeSend: function () {

            },
            success: function (retorno, textStatus, jqXHR) {
                $('#retornoTela').html(retorno);
            },
            error: function () {
            }
        });
    }

    loadContas();


    var loadConta = function (id) {
        $.ajax({
            method: "POST",
            url: APP_URL + "/contas/load_conta",
            dataType: 'json',
            data: {
                'id': id
            },
            beforeSend: function () {

            },
            success: function (retorno, textStatus, jqXHR) {

                $('#ModalContaId').val(retorno.id);
                $('#ModalContaNome').val(retorno.nm_conta);
                $('#ModalContaAgencia').val(retorno.nu_agencia);
                $('#ModalContaNumConta').val(retorno.nu_conta);

                var interval = setInterval(function(){
                    if($('#ModalContaTipoConta').prop('disabled') === false && $('#ModalContaBanco').prop('disabled') === false){
                        $('#ModalContaTipoConta').val(retorno.tipo_conta_id);
                        $('#ModalContaBanco').val(retorno.banco_id);
                        clearInterval(interval);
                    }
                }, 300);

            },
            error: function () {
            }
        });
    }


    var loadTipoConta = function() {
        $.ajax({
            method: "POST",
            url: APP_URL + "/contas/load_tipo_contas",
            dataType: 'json',
            beforeSend: function () {
                $('#ModalContaTipoConta').append(
                    $('<option>')
                        .attr({
                            'value': ''
                        }).html('Carregando...')
                );
                $('#ModalContaTipoConta').prop('disabled', true);
            },
            success: function (retorno, textStatus, jqXHR) {
                $('#ModalContaTipoConta').html('');
                if(retorno.length > 0){
                    $('#ModalContaTipoConta').append(
                        $('<option>')
                            .attr({
                                'value': ''
                            }).html('Selecione')
                    );
                    $.each(retorno, function (i, el) {
                        $('#ModalContaTipoConta').append(
                            $('<option>')
                                .attr({
                                    'data-carteira': el.fl_carteira,
                                    'value': el.id
                                }).html(el.nm_tipo_conta)
                        );
                    });
                }

                $('#ModalContaTipoConta').prop('disabled', false);
            },
            error: function () {
                $('#ModalContaTipoConta').append(
                    $('<option>')
                        .attr({
                            'value': ''
                        }).html('Erro ao carregar...')
                );
            }
        });
    }

    var loadBancos = function() {
        $.ajax({
            method: "POST",
            url: APP_URL + "/contas/load_bancos",
            dataType: 'json',
            beforeSend: function () {
                $('#ModalContaBanco').append(
                    $('<option>')
                        .attr({
                            'value': ''
                        }).html('Carregando...')
                );
                $('#ModalContaBanco').prop('disabled', true);
            },
            success: function (retorno, textStatus, jqXHR) {
                $('#ModalContaBanco').html('');
                if(retorno.length > 0){
                    $('#ModalContaBanco').append(
                        $('<option>')
                            .attr({
                                'value': ''
                            }).html('Selecione')
                    );
                    $.each(retorno, function (i, el) {
                        $('#ModalContaBanco').append(
                            $('<option>')
                                .attr({
                                    'value': el.id
                                }).html(el.nm_banco)
                        );
                    });
                }

                $('#ModalContaBanco').prop('disabled', false);
            },
            error: function () {
                $('#ModalContaBanco').append(
                    $('<option>')
                        .attr({
                            'value': ''
                        }).html('Erro ao carregar...')
                );
            }
        });
    }

    $('#CadastrarConta').click(function () {
        $('#ModalConta').find('.modal-title').html('Cadastrar Conta');


        $('#ModalContaId').val('');
        $('#ModalContaNome').val('');
        $('#ModalContaAgencia').val('');
        $('#ModalContaNumConta').val('');

        loadTipoConta();
        loadBancos();

        $('#ModalConta').modal('show');
    });

    $(document).on('click', '.EditarConta', function () {
        var id = $(this).attr('data-id');
        $('#ModalConta').find('.modal-title').html('Editar Conta');

        loadTipoConta();
        loadBancos();

        loadConta(id);

        $('#ModalConta').modal('show');
    });


    $('#ModalContaGravar').click(function () {

        var form = $('#ModalContaForm');

        $.ajax({
            method: "POST",
            url: form.attr('action'),
            dataType: 'json',
            data: form.serialize(),
            beforeSend: function () {

            },
            success: function (retorno, textStatus, jqXHR) {
                if(retorno === true){
                    $('#ModalConta').modal('hide');
                    loadContas();
                    alert('Gravado com sucesso');
                }else{
                    alert('Erro ao gravar');
                }
            },
            error: function () {

            }
        });

    });

});

