@extends('layout.app')

@section('title', 'Editando Produto')

@section('content')
<h1>Editando Produto</h1>

<form action="/admin/produtos/{{$product->id}}" method="POST">
    @csrf
    @method('PUT')

    <!-- Nome -->
    <div class="form-group mb-3">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" maxlength="255"
            id="nome" value="{{ old('nome', $product->nome) }}"
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
        <input type="text" name="slug" maxlength="255"
            id="slug" value="{{ old('slug', $product->slug) }}"
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
        <textarea name="descricao" minlength="3"
            id="descricao" class="form-control @error('descricao') is-invalid @enderror" required>{{ old('descricao', $product->descricao) }}</textarea>
        @error('descricao')
            <div class="text-danger">
                <p>{{ $message }}</p>
            </div>
        @enderror
    </div>

    <!-- Preço -->
    <div class="form-group mb-3">
        <label for="preco">Preço:</label>
        <input type="number" name="preco" min="0" step="0.01"
            id="preco" value="{{ old('preco', $product->preco) }}"
            class="form-control @error('preco') is-invalid @enderror" required>
        @error('preco')
            <div class="text-danger">
                <p>{{ $message }}</p>
            </div>
        @enderror
    </div>

    <!-- Imagem -->
    <div class="form-group mb-3">
        <label for="imagem">Imagem:</label>
        <input type="text" name="imagem" maxlength="255"
            id="imagem" value="{{ old('imagem', $product->imagem) }}"
            class="form-control @error('imagem') is-invalid @enderror">
        @error('imagem')
            <div class="text-danger">
                <p>{{ $message }}</p>
            </div>
        @enderror
    </div>

    <!-- Categoria -->
    <div class="form-group mb-3">
        <label for="id_category">Categoria:</label>
        <select class="form-select @error('id_category') is-invalid @enderror"
            aria-label="Selecione a categoria"
            name="id_category" id="id_category" required>
            <option selected disabled>Selecione uma opção</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ old('id_category', $product->id_category) == $categoria->id ? 'selected' : '' }}>
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

    <button type="submit" class="btn btn-success mt-2">Salvar</button>
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
