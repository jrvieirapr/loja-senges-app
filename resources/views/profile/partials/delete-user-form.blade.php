<section class="mb-5">
    <header>
        <h2 class="h5 text-dark">
            {{ __('Excluir Conta') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente deletados. Antes de excluir sua conta, por favor, faça o download de qualquer dado ou informação que deseje manter.') }}
        </p>
    </header>

    <!-- Botão para abrir modal -->
    <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Excluir Conta') }}
    </button>

    <!-- Modal de confirmação -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Você tem certeza que deseja excluir sua conta?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-body">
                        <p class="text-muted">
                            {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente deletados. Por favor, insira sua senha para confirmar que deseja excluir permanentemente sua conta.') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Senha') }}</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="form-control"
                                placeholder="{{ __('Senha') }}"
                                required
                            />
                            @if ($errors->userDeletion->get('password'))
                                <div class="text-danger mt-2">
                                    {{ $errors->userDeletion->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Excluir Conta') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
