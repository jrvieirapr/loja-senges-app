@extends('layout.app')
@section('title', 'Carrinho de Compras')
@section('content')
<!-- Verificar se tem algum item no carrinho -->
<div class="row">
    <div class="text-center mx-auto">
        @if($items->count() == 0)
        <!-- se estiver mostre mostre sem itens -->
        <h2>Carrinho Vazio!</h2>
        @else
        <!-- se tiver mostre o html -->
        <!-- Itere os items -->
        <table class='table mt-3 table-bordered text-center striped'>
            <thead>
                <tr>
                    <th colspan="2">Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>
                        <img src="{{$item->attributes->image}}"
                            alt="{{$item->name}}"
                            class="img-fluid rounded-circle"
                            width="80px">
                    </td>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>
                        R$ {{ number_format($item->price, 2,',','.')}}
                    </td>
                    <form action="/carrinho/atualiza" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Input Quantidade -->
                        <td>
                            <input type="number" min='1'
                                value="{{$item->quantity}}"
                                class="form-control text-center"
                                style="width: 90px; font-weight: 800px"
                                name="quantity">
                            <input type="hidden" name="id"
                                value="{{$item->id}}">
                        </td>
                        <td>
                            <!-- Botão Atualizar -->
                            <button type="submit"
                                class="btn btn-success btn-sm">
                                <i class="bi bi-arrow-repeat"></i>
                            </button>
                        </td>
                    </form>
                    <!-- Botão Remover -->
                    <td>
                        <!-- route('site.removecarrinho') -->
                        <form action="/carrinho/remove" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"
                                value="{{$item->id}}">
                            <!-- Botão Remover -->
                            <button type="submit"
                                class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Botoes -->
        <div class="text-center">
            <a class="btn color-continuar" href="/">
                Continuar Comprando
            </a>
            <a class="btn color-finalizar" href="/carrinho/finalizar">
                Finalizar Compra
            </a>
            <a class="btn color-limpar" href="/carrinho/limpar">
                Limpar Carrinho
            </a>
        </div>
        @endif
    </div>
</div>
@endsection()