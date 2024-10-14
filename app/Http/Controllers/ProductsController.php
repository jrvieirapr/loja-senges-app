<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Category;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //eu vou buscar informações do banco
        //$produtos = Products::all();
        //$produtos = Products::where('nome','nome)->first();
        //$produtos = Products::where('nome','nome)->get();
        //$produtos = Products::find($id);
        $produtos = Products::paginate(25);
        return view('admin.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /**
         * Aqui carrego a informação necessaria para criar
         * um novo registro
         */
        // Carregar as categorias
        $categorias = Category::all();
        return view('admin.produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        //Salvar o registro atraves do modelo
        //Products::create($request->all());
        // Obter o ID do usuário autenticado
        $userId = auth()->id();

        // Criar e salvar o produto, associando o ID do usuário
        Products::create(array_merge($request->validated(), ['id_user' => $userId]));

        // Redireciona ou gera um response
        //onde esta away devo usar route('admin.produtos.index')
        return redirect()->away('/admin/produtos')
            ->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $product = Products::find($id);
        return view(
            'admin.produtos.show',
            compact('product')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categorias = Category::all();
        $product = Products::find($id);
        return view(
            'admin.produtos.edit',
            compact('product', 'categorias')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, $id)
    {
        // Encontrar o produto ou lançar um erro 404 se não existir
        $product = Products::findOrFail($id);

        // Obter o ID do usuário autenticado
        $userId = auth()->id();

        // Atualizar o produto com os dados validados e o ID do usuário
        $product->update(array_merge($request->validated(), ['id_user' => $userId]));
        return redirect()->away('/admin/produtos')
            ->with(
                'success',
                'Produto atualizado com sucesso!'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product = Products::find($id);
        $product->delete();
        return redirect()->away('/admin/produtos')
            ->with(
                'success',
                'Produto removido com sucesso!'
            );
    }
}
