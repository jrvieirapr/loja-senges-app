<!-- Herdar as configurações do Layout -->
@extends('layout.app')

<!-- Ajustar o Titulo -->
@section('title', 'Criando Novo Produto')

<!-- Criar o main -->
@section('content')
    <h1 class="mb-4">Novo Produto</h1>

    <form action="/admin/produtos" method="POST">
        @csrf

        <!-- Nome -->
        <div class="form-group mb-3">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" maxlength="255" id="nome" value="{{ old('nome') }}"
                class="form-control @error('nome') is-invalid @enderror" required oninput="generateSlug()">
            @error('nome')
                <div class="text-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <!-- Slug -->
        <div class="form-group mb-3">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" maxlength="255" id="slug" value="{{ old('slug') }}"
                class="form-control @error('slug') is-invalid @enderror" required>
            @error('slug')
                <div class="text-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <!-- Descrição -->
        <div class="form-group mb-3">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" minlength="3" id="descricao" class="form-control @error('descricao') is-invalid @enderror" required>{{ old('descricao') }}</textarea>
            @error('descricao')
                <div class="text-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <!-- Preço -->
        <div class="form-group mb-3">
            <label for="preco">Preço:</label>
            <input type="number" name="preco" min="0" step="0.01" id="preco" value="{{ old('preco') }}"
                class="form-control @error('preco') is-invalid @enderror" required>
            @error('preco')
                <div class="text-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <!-- Imagem -->
        <div class="form-group mb-3">
            <label for="image">Imagem:</label>
            <input type="text" name="image" maxlength="255" id="image" value="{{ old('image') }}"
                class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="text-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <!-- Categoria -->
        <div class="form-group mb-3">
            <label for="id_category">Categoria:</label>
            <select class="form-select @error('id_category') is-invalid @enderror"
                aria-label="Selecione a categoria" name="id_category" id="id_category" required>
                <option selected disabled>Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('id_category') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
            @error('id_category')
                <div class="text-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <!-- Botão de Salvar -->
        <button type="submit" class="btn btn-success mt-3">Salvar</button>
    </form>

    <script>
        function generateSlug() {
            const nomeInput = document.getElementById('nome');
            const slugInput = document.getElementById('slug');

            // Gerar o slug
            const slug = nomeInput.value
                .toLowerCase() // converter para minúsculas
                .replace(/[^a-z0-9 -]/g, '') // remover caracteres especiais
                .trim() // remover espaços em branco no início e no final
                .replace(/\s+/g, '-') // substituir espaços por hifens
                .replace(/-+/g, '-'); // substituir múltiplos hifens por um único hifen

            slugInput.value = slug; // definir o valor do campo slug
        }
    </script>

@endsection
