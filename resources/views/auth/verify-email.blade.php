@extends('layout.app')

@section('title', 'Verificar E-mail')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mb-4 text-muted small">
                    {{ __('Obrigado por se registrar! Antes de começar, poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Se você não recebeu o e-mail, ficaremos felizes em enviar outro.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success mb-4" role="alert">
                        {{ __('Um novo link de verificação foi enviado para o endereço de e-mail que você forneceu durante o registro.') }}
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <!-- Reenviar e-mail de verificação -->
                    <form method="POST" action="/email/verification-notification">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reenviar E-mail de Verificação') }}
                        </button>
                    </form>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link">
                            {{ __('Sair') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
