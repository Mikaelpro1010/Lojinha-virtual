<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body shadow">
                <div class="row align-items-start p-3">
                    <div class="col-6">
                        <label for="">Produto:</label>
                        <div class="border-2 border-bottom border-warning mt-2">
                            {{ $produtos->nome }}
                        </div>
                    </div>

                    <div class="col-3">
                        <label for="">Quantidade:</label>
                        <input class="form-control" type="number">
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{route('listagem-produtos')}}" class="btn btn-outline-warning">Voltar</a>
                        <button class="btn btn-outline-success">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>