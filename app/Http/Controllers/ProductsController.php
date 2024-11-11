<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Category;
use App\Models\Products;

class ProductsController extends Controller
{
 
    public function index()
    {
       
        $produtos = Products::paginate(25);
        return view('admin.produtos.index', compact('produtos'));
    }

    
    public function create()
    {
       
        $categorias = Category::all();
        return view('admin.produtos.create', compact('categorias'));
    }

 
    public function store(StoreProductsRequest $request)
    {
        
        $userId = auth()->id();

        
        Products::create(array_merge($request->validated(), ['id_user' => $userId]));

        
        return redirect()->away('/admin/produtos')
            ->with('success', 'Produto criado com sucesso!');
    }

    
    public function show($id)
    {
        //
        $product = Products::find($id);
        return view(
            'admin.produtos.show',
            compact('product')
        );
    }

    
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

   
    public function update(UpdateProductsRequest $request, $id)
    {
        
        $product = Products::findOrFail($id);

        
        $userId = auth()->id();

       
        $product->update(array_merge($request->validated(), ['id_user' => $userId]));
        return redirect()->away('/admin/produtos')
            ->with(
                'success',
                'Produto atualizado com sucesso!'
            );
    }

    
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
