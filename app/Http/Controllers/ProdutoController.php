<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::get();
        $total = 0;

        foreach($produtos as $produto){
            $total += $produto->total;
        }
        return view('welcome', ['produtos'=>$produtos, 'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'quantidade' => 'required'
        ]);

        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;
        $produto->quantidadeVendida = $request->quantidadeVendida;

        $produto->save();

        return redirect()->route('listagem-produtos');
    }

    public function viewCarrinho($id){
        $produtos = Produto::find($id);

        return view('carrinho', ['produtos' => $produtos]);
    }

    public function updateCarrinho(Request $request, $id){
        $produtos = Produto::find($id);
        $produtosEstoque = $produtos->quantidade;
        $produtosVendidos = $request->quantidadeVendida;
        $produtosPreco = $produtos->preco;
        $new_quantidade = $produtos->quantidadeVendida += $produtosVendidos;

        if($new_quantidade<=$produtosEstoque){
            $produtos->total = $produtosPreco*$new_quantidade;
            $produtos->save();

            return redirect()->route('listagem-produtos', $produtos->id);
        } else {
            dd("INVALIDO!!!");
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function deleteProduct(Request $request){
        $produto = Produto::find($request->id);
        $produto->delete();
        return redirect()->route('listagem-produtos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $id)
    {
        
    }
}
