@extends('layout.app')

@section('title', 'Esqueceu a Senha')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mb-4 text-muted small">
                    {{ __('Esqueceu sua senha? Não tem problema. Basta nos informar o seu endereço de e-mail e nós lhe enviaremos um link de redefinição de senha para que você possa escolher uma nova.') }}
                </div>

                <!-- Status da Sessão -->
                @if (session('status'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Formulário de E-mail para Redefinição de Senha -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Endereço de E-mail -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('E-mail') }}</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus />
                        @if ($errors->has('email'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Enviar Link de Redefinição de Senha') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
