@extends('layouts.app')

@section('content')
    <div class="container">
        @component('component.top', ['titulo' => [__('Usuários'), ($tela == 'cadastrar' ? __('Cadastrar') : __('Editar'))]])
        @endcomponent
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="{{ ($tela == 'cadastrar' ? route('usuarios.cadastrar') : route('usuarios.editar', ['id' => $usuario->id])) }}" id="formCadastroUsuario">
                        @csrf
                        <input id="id" type="hidden" name="id"
                               value="{{ isset($usuario->id) ? $usuario->id : '' }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                       value="{{ (old('name')) ? old('name') : (!empty($usuario->nm_usuario) ? $usuario->nm_usuario : '' ) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ (old('email')) ? old('email') : (!empty($usuario->email) ? $usuario->email : '' ) }}"
                                       required
                                       {{ ($tela == 'editar' ? 'readonly' : '') }}
                                >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirmar senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ ($tela == 'cadastrar' ? __('Cadastrar') : __('Editar')) }}
                                </button>
                            </div>
                        </div>
                    </form>
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

@section('scripts')
                <script src="{{ asset('js/usuarios/cadastrar.js') }}"></script>
@endsection
