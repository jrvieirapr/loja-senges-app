@extends('layout.app')
@section('title', $categoria->nome)
@section('content')

<div class="row">
    <h2>Categoria: {{$categoria->nome}}</h2>
    @foreach($produtos as $produto)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100 d-flex flex-column">
            <img src="{{ $produto->imagem }}" alt="{{ $produto->nome }}" class="card-img-top">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">
                    {{ Str::limit($produto->nome, 30) }}
                </h5>
                <p class="card-text mb-2">
                    {{ Str::limit($produto->nome, 50) }}
                </p>
                <div class="mt-auto">
                    <a href="/site/produtos/{{ $produto->slug }}" class="btn color-button">
                        Detalhes
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@include('partials.pagination', [
        'items' => $produtos,
        'route' => "/site/categoria/".$categoria->id
    ])
@endsection