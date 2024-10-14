@extends('layout.app')

@section('title', 'Painel de Controle')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h2 class="h5 font-weight-bold">
                            {{ __('Painel de Controle') }}
                        </h2>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">
                            {{ __('Você está logado!') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
