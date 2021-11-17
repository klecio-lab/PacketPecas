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

    <title>Pagina de  Edição de Produtos</title>

                  <!-- sidenav -->
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
              <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<nav class="black" style="padding:0px 10px; position: fixed; z-index: 1111">
	<div class="nav-wrapper">
    <a href="{{ route('ClienteHome') }}" class="brand-logo"> <img src="Fimg/LogoBranca.png" alt="logo"> </a>

		<a href="#" class="sidenav-trigger" data-target="mobile-nav">
			<i class="material-icons">menu</i>
		</a>

		<ul class="right hide-on-med-and-down "  >
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li><a href="{{ route('AddProd') }}">Adicionar</a></li>
			<li><a href="{{ route('Products') }}">Produtos</a></li>
			<li><a href="{{ route('Pedidos') }}">Pedidos</a></li>
      <li><a href="{{ route('Geral') }}">Geral</a></li>
      <li><form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                      this.closest('form').submit();">
          {{ __('Sair') }}
    </a>
  </form></li>
		</ul>
	</div>
</nav>

<ul class="sidenav" id="mobile-nav"  style="z-index: 1112;">
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li><a href="{{ route('AddProd') }}">Adicionar</a></li>
			<li><a href="{{ route('Products') }}">Produtos</a></li>
			<li><a href="{{ route('Pedidos') }}">Pedidos</a></li>
      <li><a href="{{ route('Geral') }}">Geral</a></li>
      <li><form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                  this.closest('form').submit();">
      {{ __('Sair') }}
      </a>
      </form></li>
</ul>

    <center>
    <img src="{{ asset('logot.svg') }}"  alt="não carreguei">
    <div class="row container center">
        <form class="col s12" enctype="multipart/form-data" method="post" action="{{ route('editarRegName') }}" >
            <div class="row">
            @csrf
                {{-- nome do produtos --}}
                <div class="input-field col s10">
                    <input  id="nome" name='nome' type="text" class="validate" required minlength="2" value="{{ ($valores['NOME']) }}">
                    <label for="nome">Nome do Produto</label>
                </div>

                {{-- id do produtos --}}
                <div class="input-field col s2">
                    <input  id="id" name='id' type="text" class="validate"readonly value="{{ ($valores['id']) }}">
                    <label for="id">ID do Produto</label>
                </div>

                {{-- descrição produtos --}}
                <div class="input-field col s12">
                    <input id="descricao" name='descricao' type="text" class="validate" required minlength="2" value="{{ ($valores['DESCRICAO']) }}" >
                    <label for="descricao">Descrição do Produto</label>
                </div>

                {{-- preço produtos --}}
                <div class="input-field col s6">
                    <input id="preco" name='preco' type="number" class="validate" required pattern="[0-9]+$" required min="-1" step="any" max="999999999999999" value="{{ ($valores['PRECO']) }}" >
                    <label for="preco">Preço do Produto</label>
                </div>

                {{-- codigo produtos --}}
                <div class="input-field col s6">
                    <input id="codigo" name='codigo' type="number" class="validate" required pattern="[0-9]+$" required min="-1" max="999999999999999" value="{{ ($valores['CODIGO']) }}" >
                    <label for="codigo">Código do Produto</label>
                </div>

                {{-- upload imagem produtos --}}
                <div class = "row">
                    <label>Carregue Sua Imagem</label>
                    <div class = "file-field input-field">
                        <div class = "btn black">
                            <span>Buscar</span>
                            <input type="file"  accept="image/svg, image/png, image/jpeg" id='imagem' name="imagem" />
                        </div>
                        <div class = "file-path-wrapper">
                            <input class = "file-path validate s4" type = "text" placeholder = "Carregue sua Imagem" />
                        </div>
                    </div>
                </div>

                {{-- botão de envio produtos --}}
                <button onclick="myFunction()" class="btn waves-effect black" type="submit">Editar
                    <i class="material-icons edit">send</i>
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
            © 2021 PacketPeças
            </div>
          </div>
        </footer>
        
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
          $(document).ready(function(){
            $('.sidenav').sidenav();
          });
        </script>

<script>
    function myFunction(id) {
        Swal.fire
        (
        'Bom Trabalho!',
        'Produto Editado com Sucesso!',
        'success'
        )
        }
</script>
</html>
