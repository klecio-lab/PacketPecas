<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Fcss/mainPeças.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Produto</title>

    <link rel="shortcut icon" href="Fimg/logoGrande.png" />

        <!-- sidenav -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
            .limitar {
            max-width: 5ch;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            }
            .valores
            {
              text-align: left;
            }
            .descricao
            {
              max-width: 50ch;
            }
            .titulo
            {
              max-width: 25ch;
            }
            .textos
            {
              max-width: 45ch;
            }
            .espacoCima{
              margin-top: 170px;
              float: center;
            }
  </style>

<style>
  nav a{
    color: black !important;
    font-size: 25px  !important;
    
  }
  .nav-wrapper{
    height: 50px !important;
    margin-top: 2% !important;
  }
  nav a:hover{
    color: green !important;
  }
</style>

</head>
<body>
<nav class="white" style="padding:0px 10px; position: fixed;  z-index:1111;  height: 15% !important;">
	<div class="nav-wrapper">
    <a href="{{ route('ClienteHome') }}" class="brand-logo"> <img src="{{ asset('Fimg/logot.png') }}" alt="logo"> </a>

		<a href="#" class="sidenav-trigger" data-target="mobile-nav">
			<i class="material-icons">menu</i>
		</a>

		<ul class="right hide-on-med-and-down "  style="z-index:1112;">
    <li><a href="{{ route('ClienteHome') }}">Início</a></li>
			<li><a href="{{ route('ClienteProduto') }}">Produtos</a></li>
			<li><a href="{{ route('contato') }}">Contato</a></li>
      <li><a href="{{ route('sobre') }}">Nossa Empresa</a></li>
			<li><a href="{{ route('login') }}">Entrar</a></li>
		</ul>
	</div>
</nav>

<ul class="sidenav" id="mobile-nav"  style="z-index:1112;">
	    <li><a href="{{ route('ClienteHome') }}">Início</a></li>
			<li><a href="{{ route('ClienteProduto') }}">Produtos</a></li>
			<li><a href="{{ route('contato') }}">Contato</a></li>
      <li><a href="{{ route('sobre') }}">Nossa Empresa</a></li>
			<li><a href="{{ route('login') }}">Entrar</a></li>
</ul>
     
@foreach($peca as $pecas)
<div class="row center">
  <div class="col s12 m6 l6 espacoCima">
    <img class="imgPeça" src="{{ asset($pecas['IMAGEM']) }}" width='400px' height='400px' alt="Produtos">
  </div>
    
  <div class="col s12 m6 l6 espacoCima">
    <div class="valores">
      <h1 class="titulo"><span>{{ $pecas['NOME'] }}</span></h1>
      <hr class="hr2">
      
      <p class="text-sub textos"><span>{{ $pecas['DESCRICAO'] }}</span></p>

      <div class="text-sub infoProdutos">
        <button class="dropdown-btn textos">CODIGO DO PRODUTO: <br>
        {{ $pecas['CODIGO'] }}
        </button>
      </div>

      <div class="text-sub infoProdutos">
        <button class="dropdown-btn textos">PRECO DO PRODUTO: <br>
        R${{ $pecas['PRECO'] }}
        </button>
      </div>

      <hr class="hr3">

      {{-- PARTE DO CARRINHO DE COMPRAS --}}

      <pre><button class="button button1" onclick="Salvar()" >ADICIONAR AO CARRINHO</button><button class="button button3" onclick="consultor()">CONSULTOR DE VENDA</button></pre><br>

      {{-- PARTE DO CARRINHO LISTA DE PRODUTOS --}}
    <div id="refresh">
      <div class="col-25">
        <div class="container4">
            <h4>Carrinho
              <span class="price" style="color:rgb(0, 0, 0)">
                <i class="fa fa-shopping-cart"></i>
                <b id='totalpedido'></b>
              </span>
            </h4>

          <p id="carrinho">
          </p>

            <hr>

            <div id="valortotal">
            </div>
            
            <a><button onclick="Enviar('testando')" class="buttonn button4"> Comprar </button></a>
            <a><button class="limpar" onclick="limparCarrinho()"> Limpar </button></a>
        </div>
      </div>
    </div>

    </div>

  </div>
</div>

      @endforeach

    

      <footer>
        <div class="footer-content">
          <img src="Fimg/LogoFooter.png" alt="logo">
            <p class="footer-h2">Facilidade e segurança para tornar seu processo mais eficiente, conte com a confiança desta parceria.</p>
            <ul style="color: white; font-family: 'Rajdhani', sans-serif;">
                <li><a href="https://www.instagram.com/packetpecas/" style="color: white"><i class="fa fa-instagram"></i></a></li>
                <li>(81) 4125-1010</li>
                <li>packetpecas@gmail.com</li>
            </ul>
        </div>
        <br>
    </footer>

      <script src="{{ asset('Fjs/main.js') }}"></script> 
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script>
        $(document).ready(function(){
          $('.sidenav').sidenav();
        });
      </script>

      <script>
        function Salvar()
        {
          Swal.fire({
            title: 'Total de Produtos requeridos',
            icon: 'question',
            input: 'number',
            inputLabel: 'Numero de Produtos',
            inputAttributes: {
              min: 1,
              max: 1200,
              step: 1
            },
            inputValue:1
            
          }).then((data) => {

              var pegar = localStorage.getItem('id');
            
              if (pegar == null)
              {
                @foreach($peca as $pecas)
                  var ids =  "{{ $pecas['id'] }};,";
                  var NOME = "{{ $pecas['NOME'] }};,";
                  var PRECO =  "{{ $pecas['PRECO'] }};,";
                @endforeach
                var QUANTIDADE =  data['value'];
                var QUANTIDADE =  QUANTIDADE + ';,';

                localStorage.setItem('id', ids);
                localStorage.setItem('NOME', NOME);
                localStorage.setItem('QUANTIDADE', QUANTIDADE);
                localStorage.setItem('PRECO', PRECO);
                updateDiv();
            }
            else
            {
              var pegarID = localStorage.getItem('id');
              var pegarNOME = localStorage.getItem('NOME');
              var pegarQUANTIDADE = localStorage.getItem('QUANTIDADE');
              var pegarPRECO = localStorage.getItem('PRECO');

              //parte de comparar
              @foreach($peca as $pecas)
                var ids = "{{ $pecas['id'] }}";
                var NOME =  "{{ $pecas['NOME'] }}";
                var PRECO =  "{{ $pecas['PRECO'] }}";
              @endforeach
              var QUANTIDADE =  data['value'];

              var listaIds = pegarID.split(';,');
              var listaNOME = pegarNOME.split(';,');
              var listaQUANTIDADE = pegarQUANTIDADE.split(';,');
              var listaPRECO = pegarPRECO.split(';,');

              if(listaIds.includes(ids))
              {
                posicao = listaIds.indexOf(ids);
                console.log(posicao);

                var novaQUANTIDADE = parseInt(listaQUANTIDADE[posicao]);
                var novaQUANTIDADE = novaQUANTIDADE + parseInt(QUANTIDADE);
                var novoPRECO = parseFloat(novaQUANTIDADE) * parseFloat(PRECO);

                listaIds[posicao] = ids;
                listaNOME[posicao] = NOME;
                listaQUANTIDADE[posicao] =  novaQUANTIDADE;
                listaPRECO[posicao] = novoPRECO;

                var sendID = listaIds.join(';,');
                var sendNOME = listaNOME.join(';,');
                var sendnovaQUANTIDADE =  listaQUANTIDADE.join(';,');
                var sendnovoPRECO = listaPRECO.join(';,');

                localStorage.setItem('id', sendID)
                localStorage.setItem('NOME', sendNOME)
                localStorage.setItem('QUANTIDADE', sendnovaQUANTIDADE);
                localStorage.setItem('PRECO', sendnovoPRECO)
                updateDiv();
              }
              else
              {
                  //parte de concatenação
                @foreach($peca as $pecas)
                  var ids = pegarID.concat("{{ $pecas['id'] }};,");
                  var NOME =  pegarNOME.concat("{{ $pecas['NOME'] }};,");
                  var PRECO =  pegarPRECO.concat("{{ $pecas['PRECO'] }};,");
                @endforeach
                var QUANTIDADE =  data['value'];
                var QUANTIDADE =  QUANTIDADE + ';,';
                var QUANTIDADE =  pegarQUANTIDADE.concat(QUANTIDADE);
                
                  //aqui vai enviar pra local storage
                  localStorage.setItem('id', ids)
                  localStorage.setItem('NOME', NOME)
                  localStorage.setItem('QUANTIDADE', QUANTIDADE);
                  localStorage.setItem('PRECO', PRECO)
                  updateDiv();
              }
         
            }
        });
        }

        function updateDiv()
        { 
          $("#refresh").load(" #refresh > *");
          
          setTimeout(function(){ carrinho(); }, 2000);
          
        }

        function carrinho()
        {
          {{-- PEGAR  VALORES LOCAL STORAGE E ENVIAR --}}
              
          var pegarIds = localStorage.getItem('id');
          var pegarNomes = localStorage.getItem('NOME').split(';,');
          var pegarQuantidade = localStorage.getItem('QUANTIDADE');
          var pegarPrecos = localStorage.getItem('PRECO');

          //convertendo valores
          var IDS = pegarIds.split(';,').map(function (x) { 
                return parseInt(x, 10); 
              });

          var PRECO = pegarPrecos.split(';,').map(function (x) { 
            return parseFloat(x, 10); 
          });

          var QUANTIDADE = pegarQuantidade.split(';,').map(function (x) { 
              return parseInt(x, 10); 
          });

          //removendo valores nulos
          var IDS = IDS.filter(function (i) {
            return i;
          });
          
          var pegarNomes = pegarNomes.filter(function (i) {
              return i;
            });

          var PRECO = PRECO.filter(function (i) {
              return i;
            });

          var QUANTIDADE = QUANTIDADE.filter(function (i) {
            return i;
          });

          var quantidadePreco = []
          
          //FAZENDO A SOMA DOS VALORES
          var soma = 0;
          for(var i = 0; i < PRECO.length; i++) {
              soma += PRECO[i] * QUANTIDADE[i];
              adicionar = PRECO[i] * QUANTIDADE[i];
              quantidadePreco.push(adicionar);
          }

          for(var i = 0; i < pegarNomes.length; i++)
          {
            var containerProtudos = document.getElementById('carrinho');
               containerProtudos.innerHTML+=`
               <span class="valor limitar" href="#">${pegarNomes[i]}</span><span class="price">R$${quantidadePreco[i]}<button style="float: right"><i class="fa fa-trash" onclick="Excluir(${i})"></i></button></span><span style="float: center"><i class="tiny material-icons">forward</i>${QUANTIDADE[i]}</span><br>
               `;
            //console.log(pegarNomes[i]);
          }
          //valor total
          var containerProtudos = document.getElementById('valortotal');
               containerProtudos.innerHTML+=`
               <p>Total<span class="price" style="color:#059344"><b>R$${soma}</b></span></p>
               `;

          var containerProtudos = document.getElementById('totalpedido');
            containerProtudos.innerHTML+=`
            ${pegarNomes.length}
          `;
        }
        carrinho()

        function Excluir(posicao)
        {
            // pegando os valores
            var pegarID = localStorage.getItem('id');
            var pegarNOME = localStorage.getItem('NOME');
            var pegarQUANTIDADE = localStorage.getItem('QUANTIDADE');
            var pegarPRECO = localStorage.getItem('PRECO');

            // modificar os valores
            var modificadoID = pegarID.split(';,');
            var modificadoNOME = pegarNOME.split(';,');
            var modificadoQUANDIDADE = pegarQUANTIDADE.split(';,');
            var modificadoPRECO = pegarPRECO.split(';,');

            var removeID = modificadoID.splice(posicao, 1);
            var removeNOME = modificadoNOME.splice(posicao, 1);
            var removeQUANTIDADE = modificadoQUANDIDADE.splice(posicao, 1);
            var removePRECO = modificadoPRECO.splice(posicao, 1);

            //aqui vai enviar pra local storage
            localStorage.setItem('id', modificadoID.join(";,"));
            localStorage.setItem('NOME', modificadoNOME.join(";,"));
            localStorage.setItem('QUANTIDADE', modificadoQUANDIDADE.join(";,"));
            localStorage.setItem('PRECO', modificadoPRECO.join(";,"));
            updateDiv();

        }

        function limparCarrinho()
        {
          localStorage.clear();
          updateDiv();
        }

         function Enviar(Texto)
        {
            // pegando os valores
            var pegarID = localStorage.getItem('id');
            var pegarNOME = localStorage.getItem('NOME');
            var pegarQUANTIDADE = localStorage.getItem('QUANTIDADE');
            var pegarPRECO = localStorage.getItem('PRECO');

            // modificar os valores
            var modificadoID = pegarID.split(';,');
            var modificadoNOME = pegarNOME.split(';,');
            var modificadoQUANDIDADE = pegarQUANTIDADE.split(';,');
            var modificadoPRECO = pegarPRECO.split(';,');
          
            // removendo nulos
            var IDS = modificadoID.filter(function (i) {
            return i;
          });
          
          var pegarNomes = modificadoNOME.filter(function (i) {
              return i;
            });

          var PRECO = modificadoPRECO.filter(function (i) {
              return i;
            });

          var QUANTIDADE = modificadoQUANDIDADE.filter(function (i) {
            return i;
          });

          var PRECO = PRECO.map(function (x) { 
            return parseFloat(x, 10); 
          });

          //FAZENDO A SOMA DOS VALORES
          var soma = 0;
          for(var i = 0; i < PRECO.length; i++) {
              soma += PRECO[i];
          }

          var novoTudo = ''
            for(var i = 0; i < pegarNomes.length; i++)
            {
              
              var tudo = pegarNomes[i] + " | " + QUANTIDADE[i] + "\n"
              var novoTudo = novoTudo.concat(tudo)
              
            }
        uri = `Pedidos\n———————\nLista de Produtos | Quantidade\n${novoTudo}\n———————\nValor:\n R$${soma};`
        const encoded = encodeURI(uri);
        numero = "558198995121"
        var edit = `https://api.whatsapp.com/send?phone=${numero}&text=${encoded} `
        location.href = edit
        }

        function consultor()
        {
          var edit = `https://api.whatsapp.com/send?phone=558198995121&text=preciso%20de%20ajuda`
          location.href = edit
        }
      </script>
</body>
</html>
