@extends('layouts.app')

@section('content')
    <div class="container">
        @component('component.top', ['titulo' => [__('Usuários')]])
        @endcomponent
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <a href="{{ route('usuarios.cadastrar') }}" class="btn btn-outline-success">Cadastrar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if(!empty($usuarios))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th style="width: 400px;">E-mail</th>
                                    <th style="width: 10px;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->nm_usuario }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('usuarios.visualizar', ['id' => $usuario->id]) }}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('usuarios.editar', ['id' => $usuario->id]) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $usuarios->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
