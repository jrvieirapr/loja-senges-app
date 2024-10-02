@extends('layout.app')
@section('title', 'Carrinho de Compras')
@section('content')
<!-- Verificar se tem algum item no carrinho -->
<div class="row">
    <div class="mx-auto">
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
                    <th>Ações</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection()