@extends('layout.app')

@section('title', 'Confirmar Senha')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mb-4 text-muted small">
                    {{ __('Esta é uma área segura da aplicação. Por favor, confirme sua senha antes de continuar.') }}
                </div>

                <form method="POST" action="/confirm-password">
                    @csrf

                    <!-- Senha -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Senha') }}</label>
                        <input id="password" class="form-control"
                               type="password"
                               name="password"
                               required autocomplete="current-password">

                        @if ($errors->has('password'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <!-- Botão Confirmar -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirmar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
