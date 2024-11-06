<nav class="navbar navbar-expand-lg navbar-dark color-fundo py-3 shadow-sm">
    <div class="container-fluid">
        <!-- Coluna Esquerda: Logo da loja -->
        <a href="/" class="navbar-brand fw-bold">Loja Senges</a>

        <!-- Botão para menu hambúrguer em dispositivos móveis -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Itens do Menu (Responsivo) -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="container d-flex flex-column align-items-center">
                
                <!-- Linha Superior: Barra de Pesquisa e Menu de Autenticação -->
                <div class="d-flex justify-content-between align-items-center w-100 mb-2">
                    <!-- Barra de pesquisa com tamanho ajustado -->
                    <form class="d-flex w-75 me-3" role="search" action="/site/produtos/pesquisa" method="POST">
                        @csrf
                        <input class="form-control me-2" type="search" id="pesquisa" name="pesquisa" placeholder="Buscar produtos" aria-label="Buscar produtos">
                        <button class="btn btn-outline-light" type="submit">Pesquisar</button>
                    </form>

                    <!-- Menu de Autenticação -->
                    <ul class="navbar-nav d-flex align-items-center">
                        @auth
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle text-white" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Cadastros
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/admin/categorias">Categoria</a></li>
                                    <li><a class="dropdown-item" href="/admin/produtos">Produtos</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle text-white" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <a href="/register" class="nav-link text-white ms-2">Registro</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/carrinho">
                                Carrinho
                            </a>
                        </li>
                       
                    </ul>
                </div>

                <!-- Linha Inferior: Menu de Categorias -->
                <ul class="navbar-nav justify-content-left w-100">
                    <li class="nav-item">
                        <p class="nav-link text-white mb-0">Categorias:</p>
                    </li>
                    @foreach ($categoriasMenu as $categoria)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/site/categoria/{{ $categoria->id }}">
                                {{ $categoria->nome }}
                            </a>
                        </li>
                    @endforeach

                 
                </ul>
            </div>
        </div>
    </div>
</nav>
