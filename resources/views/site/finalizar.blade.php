@extends('layout.app')
@section('title', 'Finalizar Pedido')
@section('content')

<!-- Dados do Usuário Autenticado -->
<div class="card mb-4">
    <div class="card-header">Dados do Usuário</div>
    <div class="card-body">
        <p><strong>Nome:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    </div>
</div>

<!-- Tabela de Produtos no Carrinho -->
<div class="card mb-4">
    <div class="card-header">Itens no Carrinho</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Cart::getContent() as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>R$ {{ number_format($item->getPriceSum(), 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                    <td><strong>R$ {{ number_format(Cart::getTotal(), 2, ',', '.') }}</strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="text-center">
            <a class="btn color-finalizar" href="/carrinho/pedido">
                Realizar Pedido
            </a>
        </div>
    </div>
</div>

@endsection