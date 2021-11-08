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

    <title>Pagina de Produtos</title>
</head>
<body>


    <center>
    <img src="logot.svg" alt="">
    <div class="row container center">
        <form class="col s12" enctype="multipart/form-data" method="post" action="{{ route('products.update') }}" >
            <div class="row">
            @csrf
            {{-- nome do produtos --}}
                <div class="input-field col s12">
                    <input  id="nome" name='nome' type="text" required minlength="2" class="validate">
                    <label for="nome">Nome do Produto</label>
                </div>

                {{-- descrição produtos --}}
                <div class="input-field col s12">
                    <input id="descricao" name='descricao' type="text" required minlength="2" class="validate">
                    <label for="descricao">Descrição do Produto</label>
                </div>

                {{-- preço produtos --}}
                <div class="input-field col s6">
                    <input id="preco" name='preco'  type="number" required pattern="[0-9]+$" required min="-1" step="any" max="999999999999999" class="validate">
                    <label for="preco">Preço do Produto</label>
                </div>

                {{-- codigo produtos --}}
                <div class="input-field col s6">
                    <input id="codigo" name='codigo'  type="number" required pattern="[0-9]+$" required min="-1" max="999999999999999" class="validate">
                    <label for="codigo">Código do Produto</label>
                </div>

                {{-- upload imagem produtos --}}
                <div class = "row">
                    <label>Carregue Sua Imagem</label>
                    <div class = "file-field input-field">
                        <div class = "btn black">
                            <span>Buscar</span>
                            <input type="file"  accept="image/svg, image/png, image/jpeg" id='imagem' required name="imagem" />
                        </div>
                        <div class = "file-path-wrapper">
                            <input class = "file-path validate s4" type = "text" placeholder = "Carregue sua Imagem" />
                        </div>
                    </div>
                </div>

                {{-- botão de envio produtos --}}
                <button onclick="myFunction()" class="btn waves-effect black" type="submit">Cadastrar
                    <i class="material-icons right">send</i>
                </button>
            
        </form>
    </div>
    </div></center>

    

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
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function myFunction(id) {
        Swal.fire(
  'Bom Trabalho!',
  'Produto Cadastrado com Sucesso!',
  'success'
)
}
</script>
</html>
</x-app-layout>