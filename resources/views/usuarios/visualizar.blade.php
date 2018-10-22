@extends('layouts.app')

@section('content')
    <div class="container">
        @component('component.top', ['titulo' => [__('Usuários'), $usuario->nm_usuario]])
        @endcomponent
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label>Nome</label>
                                        <div>{{ $usuario->nm_usuario }}</div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label>E-mail</label>
                                        <div>{{ $usuario->email }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label>Data de criação</label>
                                        <div>{{ $usuario->created_at }}</div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label>Ultima alteração</label>
                                        <div>{{ $usuario->updated_at }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2">
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
