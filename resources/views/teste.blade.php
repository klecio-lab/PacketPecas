<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script> 
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pagina de Produtos</title>
</head>
<body>

<div class="container">
    <div class="row">
       @foreach($produtover as $produto)
        <div class="col s5 16">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{ $produto['IMAGEM'] }}" alt='não funciona' />
                </div>

                {{-- Card Principal do Produto --}}
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><b>{{ $produto['NOME'] }}</b><i class="material-icons right">more_vert</i></span>
                    <span class="card-title activator grey-text text-darken-4">R${{ $produto['PRECO'] }}</span>
                    <p><button onclick='' ><i class="material-icons">create</i></button> <button onclick="excluir({{ $produto['id'] }})"><i class="material-icons">delete</i></button></p>
                </div>

                {{-- Descrição do Produto --}}
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{ $produto['NOME'] }}<i class="material-icons right">close</i></span>
                    <p>{{ $produto['DESCRICAO'] }}</p>
                    <p>Codigo: 818181</p>
                </div>
            </div>
        </div> 
        @endforeach
    </div>
</div>
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='botoes.js' type='text/javascript'></script>

</html>