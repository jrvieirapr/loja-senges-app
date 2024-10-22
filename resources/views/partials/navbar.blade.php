<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Logo ou nome da empresa -->
        <a href="/" class="navbar-brand">Loja Senges</a>

        <!-- Botão para menu hambúrguer em dispositivos móveis -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu de Navegação -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>

                <!-- Dropdown de Categorias -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($categoriasMenu as $categoria)
                            <li>
                                <a class="dropdown-item" href="/site/categoria/{{ $categoria->id }}">
                                    {{ $categoria->nome }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('carrinho') ? 'active' : '' }}" href="/carrinho">Carrinho</a>
                </li>
            </ul>

            <!-- Área de autenticação (alinhado à direita) -->
            <ul class="navbar-nav ms-auto bg-dark text-white p-3 rounded">
                @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="/admin/categorias">Categoria</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/admin/produtos">Produtos</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="/perfil" class="dropdown-item">Perfil</a>
                        </li>
                        <li>
                            <!-- Formulário para o logout -->
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    {{ __('Sair') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a href="/login" class="nav-link text-white">Login</a>
                </li>
                <li class="nav-item">
                    <a href="/register" class="nav-link text-white">Registro</a>
                </li>
                @endauth
            </ul>ndauth
            </ul>
        </div>
    </div>
</nav>
