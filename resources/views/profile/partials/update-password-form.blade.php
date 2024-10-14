<section>
    <header>
        <h2 class="h5 text-dark">
            {{ __('Atualizar Senha') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Garanta que sua conta está utilizando uma senha longa e aleatória para permanecer segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <!-- Senha Atual -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Senha Atual') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" required />
            @if ($errors->updatePassword->get('current_password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <!-- Nova Senha -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('Nova Senha') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" required />
            @if ($errors->updatePassword->get('password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <!-- Confirmar Senha -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirmar Senha') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" required />
            @if ($errors->updatePassword->get('password_confirmation'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <!-- Botão Salvar e Status -->
        <div class="d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>

            @if (session('status') === 'password-updated')
                <p class="text-success small mb-0">
                    {{ __('Salvo.') }}
                </p>
            @endif
        </div>
    </form>
</section>
