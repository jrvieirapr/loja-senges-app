<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- href="route('site.home') -->
        <!-- Logo ou nome da empresa -->
        <a href="/" class="navbar-brand">Loja Senges</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" 
                    href="/admin/categorias">Categoria - Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" 
                    href="/admin/produtos">Produtos - Admin</a>
                </li>
                <!-- Colar Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($categoriasMenu as $categoria)
                        <li>
                            <a class="dropdown-item"
                                href="/site/categoria/{{$categoria->id}}">
                                {{$categoria->nome}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/carrinho">Carrinho</a>
                </li>
            </ul>
            <!-- Se tiver Logado Mostre o perfil -->
            <!-- Área de autenticação (alinhado à direita) -->
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a href="/perfil" class="dropdown-item">Perfil</a>
                        </li>
                        <li>
                            <a href="/logout" class="dropdown-item">Sair</a>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a href="/login" class="nav-link">Login</a>
                </li>
                @endauth
            </ul>           
        </div>
    </div>

</nav>