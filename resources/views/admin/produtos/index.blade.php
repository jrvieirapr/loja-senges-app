<!-- Herdar as configurações do Layout -->
@extends('layout.app')

<!-- Ajustar o Titulo -->
@section('title','Produtos')

<!-- Criar o main -->
@section('content')

<h1 class="mb-4">Produtos</h1>

<a href="/admin/produtos/create" class="btn btn-success mb-3">Novo</a>

<div class="table-responsive">
    <table class="table table-hover table-striped align-middle text-center">
        <thead>
            <tr>
                <th class="text-start">Nome</th>
                <th class="text-start">Preço</th>
                <th colspan="3" style="width:15%">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td class="text-start">{{ $produto->nome }}</td>
                <td class="text-start">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <!-- Visualizar -->
                <td>
                    <a href="/admin/produtos/{{ $produto->id }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
                <!-- Editar -->
                <td>
                    <a href="/admin/produtos/{{ $produto->id }}/edit" class="btn btn-sm btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
                <!-- Remover -->
                <td>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-product-id="{{ $produto->id }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', [
        'items' => $produtos,
        'route' => '/admin/produtos'
    ])
</div>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Remoção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja remover este produto?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST"action="/admin/produtos/{{$produto->id}}">>
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    var confirmDeleteModal = document.getElementById('confirmDeleteModal');
    confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var productId = button.getAttribute('data-product-id');
        var form = document.getElementById('deleteForm');
        form.action = '/admin/produtos/' + productId;
    });
</script>
@endsection
