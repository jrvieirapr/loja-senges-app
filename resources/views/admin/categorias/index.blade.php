<!-- Herdar as configurações do Layout -->
@extends('layout.app')

<!-- Ajustar o Titulo -->
@section('title','Categorias')

<!-- Criar o main -->
@section('content')

<h1 class="mb-4">Categorias</h1>

<a href="/admin/categorias/create" class="btn btn-success mb-3">Novo</a>

<div class="table-responsive">
    <table class="table table-hover table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th class="text-start">Nome</th>
                <th colspan="3" style="width:15%">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td class="text-start">{{ $categoria->nome }}</td>
                <!-- Visualizar -->
                <td>
                    <a href="/admin/categorias/{{$categoria->id}}" class="btn btn-sm btn-primary">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
                <!-- Editar -->
                <td>
                    <a href="/admin/categorias/{{$categoria->id}}/edit" class="btn btn-sm btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
                <!-- Remover -->
                <td>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-category-id="{{ $categoria->id }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', [
        'items' => $categorias,
        'route' => '/admin/categorias'
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
                Tem certeza que deseja remover esta categoria?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="/admin/categorias/{{$categoria->id}}">
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
        var categoryId = button.getAttribute('data-category-id');
        var form = document.getElementById('deleteForm');
        form.action = '/admin/categorias/' + categoryId;
    });
</script>
@endsection
