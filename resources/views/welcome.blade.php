<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/175ab79a69.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card mb-3 mt-3">
            <div class="card-header shadow">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Cadastrar produto
                    </button>
                </div>
            </div>
        </div>
        <div class="card mt-3 shadow">
            <div class="card-header text-center">
                <h2>Lista de produtos</h2>
            </div>
            <div class="card-body border p-3">
                <div class="d-flex justify-content-end">
                    <div class="mx-2">
                        <input type="text" class="form-control">
                    </div>
                    <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Nome
                            </th>
                            <th>
                                Preço
                            </th>
                            <th>
                                Quantidade
                            </th>
                            <th>
                                N° vendidos
                            </th> 
                            <th>
                                Valor arrecadado
                            </th> 
                            <th>
                                Ações
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($produtos as $produto)
                        <tr>
                            <td>
                                {{$produto->id}}
                            </td>
                            <td>
                                {{$produto->nome}}
                            </td>
                            <td>
                                {{$produto->preco}}
                            </td>
                            <td>
                                {{$produto->quantidade}}
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                {{$produto->total}}
                            </td>
                            <td>
                                <a class="btn btn-outline-success" href="{{ route('carrinho-compras', ['id' => $produto->id]) }}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></a>
                                <a class="btn btn-outline-danger" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('create-product')}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input class="form-control" name="nome" type="text">
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Preço:</label>
                    <input class="form-control" name="preco" type="text">
                </div>

                <div>
                    <label class="form-label">Quantidade:</label>
                    <input class="form-control" name="quantidade" type="text">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </form>
    </div>
    </div>

        <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar quantidade</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Quantidade vendida:</label>
                    <input class="form-control" type="text" name="quantidade">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
