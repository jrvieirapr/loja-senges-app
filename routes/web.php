<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/admin/categorias', CategoryController::class);

    Route::resource('/admin/produtos', ProductsController::class);


    Route::get('/carrinho/finalizar', [
        CarrinhoController::class,
        'finalizar'
    ])->name('site.finalizar');
});

Route::get('/', [SiteController::class, 'index'])
    ->name('site.home');

Route::get(
    '/site/produtos/{slug}',
    [SiteController::class, 'detalhes']
)
    ->name('site.detalhes');

Route::get(
    '/site/categoria/{categoria}',
    [SiteController::class, 'categoria']
)
    ->name('site.categoria');


 Route::post('/site/produtos/pesquisa',
[SiteController::class,'pesquisa'])
->name('site.pesquisa');   

// Rotas do carrinho
Route::get('/carrinho', [CarrinhoController::class, 'lista'])
    ->name('site.carrinho');

Route::post('/carrinho', [
    CarrinhoController::class,
    'adicionaCarrinho'
])->name('site.addcarrinho');

Route::post('/carrinho/remove', [
    CarrinhoController::class,
    'removeCarrinho'
])->name('site.remcarrinho');

Route::post('/carrinho/atualiza', [
    CarrinhoController::class,
    'atualizarCarrinho'
])->name('site.updatecarrinho');

Route::get('/carrinho/limpar', [
    CarrinhoController::class,
    'limparCarrinho'
])->name('site.limparcarrinho');



require __DIR__ . '/auth.php';
