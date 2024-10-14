<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Aqui eu deixo disponivel para toda aplicao
        //Estou pedindo todas as categorias
        try {
            $categoriasMenu = Category::all();
            view()->share('categoriasMenu', $categoriasMenu);
        } catch (\Exception $e) {
            // Lida com a exceção e pode logar o erro ou realizar outra ação
            \Log::error('Erro ao carregar categorias para o menu: ' . $e->getMessage());

            // Opcional: definir uma variável vazia ou padrão se houver erro
            view()->share('categoriasMenu', collect());
        }
    }
}
