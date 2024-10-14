@extends('layout.app')

@section('title', 'Editar Perfil')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="h4 font-weight-bold text-dark">
                    {{ __('Perfil') }}
                </h2>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Formulário de Atualização de Informações do Perfil -->
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Formulário de Atualização de Senha -->
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Formulário de Exclusão de Conta -->
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
