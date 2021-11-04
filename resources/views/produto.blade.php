<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <br>
    <br>
    
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
      <style>
          .limitar {
            max-width: 11ch;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            }
      </style>

    <title>Pagina de Produtos</title>
</head>
<body>


      <br>
<div class="container">

<form action="{{ route('product.search') }}" method="post">
        @csrf
        <input type="text" id="buscar" name="buscar" placeholder="Filtrar: ">
        <button type='submit' class="btn black-effect black">Pesquisar</button>
    </form>
    


    <div class="row">
    @if(isset($busca))
      @foreach($busca as $filtro)
          <div class="col s4 16">
              <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" style='width: 240px; height: 240px;' src="{{ asset($filtro['IMAGEM']) }}" alt='não funciona' />
                  </div>

                  {{-- Card Principal do Produto --}}
                  <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4 limitar"><b>{{ $filtro['NOME'] }}</b></span><span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
                      <span class="card-title activator grey-text text-darken-4">R${{ $filtro['PRECO'] }}</span>
                      <p><button onclick="editar({{ $filtro['id'] }})" class="btn-floating btn-medium waves-effect waves-light black"><i class="material-icons">create</i></button> <button class="btn-floating btn-medium waves-effect waves-light red" onclick="excluir({{ $filtro['id'] }})"><i class="material-icons">delete</i></button></p>
                  </div>

                  {{-- Descrição do Produto --}}
                  <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">{{ $filtro['NOME'] }}<i class="material-icons right">close</i></span>
                      <p>{{ $filtro['DESCRICAO'] }}</p>
                      <p><b>Codigo:</b>{{ $filtro['CODIGO'] }}</p>
                  </div>
              </div>
          </div> 
          @endforeach
        </div> 

    @else
       @foreach($produtover as $produto)
        <div class="col s4 16">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" style='width: 240px; height: 240px;' src="{{ $produto['IMAGEM'] }}" alt='não funciona' />
                </div>

                {{-- Card Principal do Produto --}}
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4 limitar"><b>{{ $produto['NOME'] }}</b></span><span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
                    <span class="card-title activator grey-text text-darken-4">R${{ $produto['PRECO'] }}</span>
                    <p><button onclick="editar({{ $produto['id'] }})" class="btn-floating btn-medium waves-effect waves-light black"><i class="material-icons">create</i></button> <button class="btn-floating btn-medium waves-effect waves-light red" onclick="excluir({{ $produto['id'] }})"><i class="material-icons">delete</i></button></p>
                </div>

                {{-- Descrição do Produto --}}
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{ $produto['NOME'] }}<i class="material-icons right">close</i></span>
                    <p>{{ $produto['DESCRICAO'] }}</p>
                    <p><b>Codigo:</b>{{ $produto['CODIGO'] }}</p>
                </div>
            </div>
        </div> 
        @endforeach
      
    </div>
    <div class='center'>
      {{ $produtover->links('shared.paginacao') }}
        </div>
        @endif


          </div>
  <br>
</div>

</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='botoes.js' type='text/javascript'></script>

<footer class="page-footer center black">
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

</html>
</x-app-layout>
