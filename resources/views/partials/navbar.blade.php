<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 shadow-sm">
    <div class="container-fluid">

        <!-- Primeira linha: Logo e botão do menu -->
        <a href="/" class="navbar-brand fw-bold">Loja Senges</a>

        <!-- Botão para menu hambúrguer em dispositivos móveis -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Itens do Menu (Responsivo) -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="w-100 d-flex justify-content-between align-items-center">
                <!-- Menu principal (Home, Carrinho e Categorias) -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('carrinho') ? 'active' : '' }}"
                            href="/carrinho">Carrinho</a>
                    </li>
                    <li class="nav-item">

                        <p class="nav-link  text-white">Departamentos:</p>
                    </li>
                    @foreach ($categoriasMenu as $categoria)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/site/categoria/{{ $categoria->id }}">
                                {{ $categoria->nome }}
                            </a>
                        </li>
                    @endforeach
                </ul>



                <!-- Área de autenticação -->
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-white" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastros
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/admin/categorias">Categoria</a></li>
                                <li><a class="dropdown-item" href="/admin/produtos">Produtos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-white" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="/perfil" class="dropdown-item">Perfil</a></li>
                                <li>
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <button type="submit" class="dropdown-item">{{ __('Sair') }}</button>
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
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Barra de pesquisa maior -->

<div class="bg-dark px-4 py-2">
    <form class="d-flex mx-auto w-50" role="search" action="/site/produtos/pesquisa" method="POST">
        @csrf
        <input class="form-control me-2" type="search" id="pesquisa" name="pesquisa" placeholder="Buscar produtos"
            aria-label="Buscar produtos">
        <button class="btn btn-outline-light" type="submit">Pesquisar</button>
    </form>
</div>
