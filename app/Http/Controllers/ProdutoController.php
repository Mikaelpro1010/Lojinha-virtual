<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Validator;

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
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'nome' => 'required|string|max:255',
        //         'preco' => 'required|string|max:255',
        //         'quantidade' => 'required|string|max:255',
        //     ],
        //     [
        //         'nome.required' => 'É necessário possuir um nome para ser editado!',
        //         'preco.required' => 'É necessário possuir um preço para ser editado!',
        //         'quantidade.required' => 'É necessário possuir uma quantidade para ser editado!',
        //         'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
        //     ]
        // );

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        if($request->nome == null && $request->preco == null && $request->quantidade == null){
            return redirect()->route('listagem-produtos')->with('error','Todos os campos são obrigatório!');
        }
        if($request->nome == null){
            return redirect()->route('listagem-produtos')->with('error','O campo Nome é obrigatório!');
        }
        if($request->preco == null){
            return redirect()->route('listagem-produtos')->with('error','O campo Preco é obrigatório!');
        }
        if($request->quantidade == null){
            return redirect()->route('listagem-produtos')->with('error','O campo Quantidade é obrigatório!');
        }
        $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'quantidade' => 'required'
        ]);

        $produto = new Produto();
        
        $produto->nome = $request->sandy;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;
        $produto->quantidadeVendida = $request->quantidadeVendida;

        $produto->save();

        return redirect()->route('listagem-produtos')->with('success','Produto cadastrado com sucesso!');
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

            return redirect()->route('listagem-produtos', $produtos->id)->with('success', 'Os produtos foram vendidos com sucesso!');
        } else {
            return redirect()->route('listagem-produtos', $produtos->id)->with('error', 'Não foi possivel cadastrar o produto');
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
        return redirect()->route('listagem-produtos')->with('success', 'Produto deletado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $id)
    {
        
    }
}
