<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <br>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dashboard</title>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>            
            <style>
              .rodape{
                position: absolute;
                bottom: 0px;
                width: 100%
              }
            </style>
          </head>
        <body>
<div>

        <h1 align="center" >Dashboard</h1>
        <div class="card-group"> 
                <pre>    </pre>
                <div class="card text-white bg-success mb-3" style="max-width: 100%;">
                    <div class="card-header">Quantidade de Pedidos</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $QuantidadePedidos }}  <i class="material-icons medium" style="float: right;">insert_chart</i></h5>
                            <p class="card-text">Total de Pedidos</p>
                        </div>
                    </div>
                    <pre>    </pre>
                <div class="card text-white bg-dark mb-3" style="max-width: 100%; float: center;">
                    <div class="card-header">Quantidade de Produtos</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $QuantidadeProdutos }} <i class="material-icons medium" style="float: right;">tune</i></h5>
                            <p class="card-text">Total de Produtos </p>
                            
                        </div>
                    </div>
                    <pre>    </pre>
    </div>
    </div>

    <br>
    <footer class="page-footer center black rodape">
          <div class="container center">
            <div class="row">
              <div class="col l12 s12 ">
                <h5 class="white-text">PacketPeças</h5>
                <p class="grey-text text-lighten-4">O sucesso é a soma de pequenos esforços do dia a dia.</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2020 PacketPeças
            </div>
          </div>
        </footer>

        </body>
    </html>
    <br>
</x-app-layout>
