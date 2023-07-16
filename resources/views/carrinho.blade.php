@extends('layout')
@section('conteudo')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body shadow">
                <form action="{{route('update-carrinho', $produtos->id)}}" method="POST">
                <div class="row align-items-start p-3">
                    <div class="col-6">
                        <label for="">Produto:</label>
                        <div class="border-2 border-bottom border-warning mt-2">
                            {{ $produtos->nome }}
                        </div>
                    </div>
                        {{ csrf_field() }}
                        <div class="col-3">
                            <label for="">Quantidade:</label>
                            <input class="form-control" name="quantidadeVendida" type="number" placeholder="Quantidade">
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('listagem-produtos')}}" class="btn btn-outline-secondary">Voltar</a>
                            <button class="btn btn-outline-success" type="submit">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection