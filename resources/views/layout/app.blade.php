<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Senges - @yield('title') </title>
    <!-- Inserir CSS do bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Inserir o Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .color-fundo {
            background-color: #443a57;
        }

        /* Estilo do botão */
        .color-button {
            background-color: #9589AC;
            color: #FFF;
            /* Cor do texto do botão */
            border: 2px solid #6E5B7B;
            /* Borda sutil */
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;

        }


        .color-button:hover {
            background-color: #968DA8;
        }

        /* Botão de Finalizar Compra (CTA - cor viva) */
        .color-finalizar {
            background-color: #28a745;
            /* Verde vívido para CTA */
            color: #FFF;
            /* Texto branco */
            border: 2px solid #218838;
            /* Borda verde escura */
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .color-finalizar:hover {
            background-color: #218838;
            /* Fundo mais escuro no hover */
            border-color: #1e7e34;
            /* Borda mais escura */
        }

        .color-finalizar:focus,
        .color-finalizar:active {
            outline: none;
            background-color: #1e7e34;
            /* Fundo ainda mais escuro ao clicar */
            border-color: #155724;
            /* Borda mais escura ao clicar */
        }

        /* Botão de Limpar Carrinho */
        .color-limpar {
            background-color: #6c757d;
            /* Cinza neutro */
            color: #FFF;
            border: 2px solid #5a6268;
            /* Borda em tom semelhante */
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .color-limpar:hover {
            background-color: #5a6268;
            /* Fundo mais escuro no hover */
            border-color: #495057;
        }

        .color-limpar:focus,
        .color-limpar:active {
            outline: none;
            background-color: #495057;
            /* Fundo ainda mais escuro ao clicar */
            border-color: #343a40;
        }

        /* Botão de Continuar Comprando */
        .color-continuar {
            background-color: #9589AC;
            /* Roxo claro */
            color: #FFF;
            border: 2px solid #6E5B7B;
            /* Borda mais escura */
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .color-continuar:hover {
            background-color: #6E5B7B;
            /* Fundo mais escuro no hover */
            border-color: #524158;
        }

        .color-continuar:focus,
        .color-continuar:active {
            outline: none;
            background-color: #524158;
            /* Fundo ainda mais escuro ao clicar */
            border-color: #3A2F42;
        }


        /* Estilo para links */
        a {
            color: #E1D9EB;
            text-decoration: none;
        }

        a:hover {
            color: #968DA8;
        }

        /* Container de paginação */
        .pagination {
            display: flex;
            justify-content: center;
            padding: 10px;
            margin: 0;
            list-style: none;
        }

        /* Itens de página */
        .page-item {
            margin: 0 5px;
            /* Espaçamento entre itens */
        }

        .page-item .page-link {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            color: #6E5B7B;
            /* Cor base */
            background-color: #F5F5F5;
            /* Fundo claro */
            border: 1px solid #DADADA;
            /* Borda sutil */
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        /* Cor de hover */
        .page-item .page-link:hover {
            background-color: #9589AC;
            /* Fundo mais escuro */
            color: #FFF;
            /* Texto branco */
            border-color: #6E5B7B;
            /* Cor da borda */
        }

        /* Página ativa */
        .page-item.active .page-link {
            background-color: #6E5B7B;
            /* Fundo da página ativa */
            color: #FFF;
            /* Texto branco */
            border-color: #524158;
            /* Cor da borda */
            pointer-events: none;
            /* Remove a interação */
        }

        /* Itens desativados */
        .page-item.disabled .page-link {
            background-color: #E9ECEF;
            /* Fundo mais claro */
            color: #ADB5BD;
            /* Texto cinza claro */
            border-color: #DADADA;
            /* Borda sutil */
            pointer-events: none;
            /* Remove a interação */
        }

        /* Ajustes para setas (‹ e ›) */
        .page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            font-size: 18px;
            /* Maior para as setas */
        }

        /* Responsividade */
        @media (max-width: 576px) {
            .page-item .page-link {
                padding: 8px 12px;
                font-size: 12px;
            }
        }
    </style>

</head>

<body>
    <!-- cabecalho -->
    <header>
        <!-- Carregando o partial -->
        @include('partials.navbar')
    </header>
    <!-- Principal -->
    <main>
        <!-- Verifica se existe uma mensagem de sucesso -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Verifica se existe uma mensagem de erro -->
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container mt-4 mb-4" style="min-height: 675px;">
            @yield('content')
        </div>
    </main>
    <!-- Rodape -->
    <!-- Carregando o partial -->
    @include('partials.footer')
    <!-- Inserir JS do bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
