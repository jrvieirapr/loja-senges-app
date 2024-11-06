<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart;

class CarrinhoController extends Controller
{
    //Metodo responsavel pela visualização do carrinho
    public function lista()
    {
        // pegar itens dos carrinho
        $items = \Cart::getContent();
        //redirecionar para a view carrinho e passar itens
        return view('site.carrinho', compact('items'));
    }

    public function adicionaCarrinho(Request $request)
    {
        // dd($request);
        \Cart::add(
            [
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->qnt,
                'attributes' => array(
                    'image' => $request->img
                )
            ]
        );
        return redirect()->away('/carrinho')
            ->with('success', 'Produto adiciondo com sucesso!');
    }

    public function removeCarrinho(Request $request)
    {
        \Cart::remove([

            'id' => $request->id
        ]);

        return redirect()->away('/carrinho')
            ->with('success', 'Produto removido com sucesso!');
    }

    public function atualizarCarrinho(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ]
        ]);
        return redirect()->away('/carrinho')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function limparCarrinho()
    {
        \Cart::clear();
        // return redirect()->route('site.carrinho');
        return redirect()->away('/carrinho')
            ->with('success', 'Carrinho limpo com sucesso!');
    }

    public function finalizar(){
        // pegar itens dos carrinho
        $items = \Cart::getContent();
        //redirecionar para a view carrinho e passar itens
        \Cart::clear();
        return view('site.finalizar', compact('items'));
    }
}
