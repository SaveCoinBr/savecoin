@extends('layouts.app')

@section('content')
    <div class="container">
        @component('component.top', ['titulo' => [__('Contas')]])
        @endcomponent
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button id="CadastrarConta" class="btn btn-outline-success">Cadastrar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" id="retornoTela">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="ModalConta" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar Conta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" id="ModalContaForm" action="{{ route('contas.salvar') }}">
                                @csrf

                                <input
                                    id="ModalContaId"
                                    type="hidden"
                                    name="id"
                                    value=""
                                >
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Tipo de conta</label>
                                        <select name="tipo_conta" class="form-control" id="ModalContaTipoConta"></select>
                                    </div>
                                    <div class="form-group col">
                                        <label>Nome da conta</label>
                                        <input type="text" class="form-control" id="ModalContaNome" name="nome_conta" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Banco</label>
                                        <select name="banco" class="form-control" id="ModalContaBanco"></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Agência</label>
                                        <input type="text" class="form-control" id="ModalContaAgencia" name="agencia" value="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Conta</label>
                                        <input type="text" class="form-control" id="ModalContaNumConta" name="conta" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="ModalContaGravar">Gravar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('js/contas/index.js') }}"></script>
@endsection
