<section class="mb-5">
    <header>
        <h2 class="h5 text-dark">
            {{ __('Informações do Perfil') }}
        </h2>

        <p class="text-muted">
            {{ __("Atualize as informações do perfil e o endereço de e-mail da sua conta.") }}
        </p>
    </header>

    <!-- Formulário para reenvio de verificação -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Formulário para atualizar perfil -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <!-- Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nome') }}</label>
            <input
                id="name"
                name="name"
                type="text"
                class="form-control"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            />
            @if ($errors->has('name'))
                <div class="text-danger mt-2">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <!-- E-mail -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('E-mail') }}</label>
            <input
                id="email"
                name="email"
                type="email"
                class="form-control"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            />
            @if ($errors->has('email'))
                <div class="text-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-muted small">
                        {{ __('Seu endereço de e-mail não está verificado.') }}

                        <button form="send-verification" class="btn btn-link p-0">
                            {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small">
                            {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Botão Salvar e Status -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>

            @if (session('status') === 'profile-updated')
                <p class="text-success small mb-0">
                    {{ __('Salvo.') }}
                </p>
            @endif
        </div>
    </form>
</section>
