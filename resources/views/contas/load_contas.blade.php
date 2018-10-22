
@if(!empty($contas))
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nome da conta</th>
            <th>Banco</th>
            <th style="width: 400px;">Agência / Conta</th>
            <th style="width: 10px;"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($contas as $conta)
            <tr>
                <td>{{ $conta->nm_conta }}</td>
                <td>{{ $conta->banco->nm_banco }}</td>
                <td>{{ $conta->nu_agencia . ' / ' . $conta->nu_conta }}</td>
                <td>
                    <a data-id="{{ $conta->id }}" class="EditarConta btn btn-info btn-sm"
                       href="#">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $contas->links() }}
@endif
