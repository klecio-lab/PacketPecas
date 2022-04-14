<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Fcss/mainProdutos.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="Fimg/logoGrande.png" />
    
    <!-- sidenav -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <style>
              .limitar {
            max-width: 25ch;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            }
            .menu a{
              color: white;
              text-decoration: none;
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

    <title>Produtos</title>
</head>
<body>

  @include('templateFront.navbar')


<br><br><br><br>

<div class="text-principal">
      <h2>Peças e Produtos</h2>
      <hr class="hr1">
</div>

<center>
  <nav class="dp-menu estilo">
    <ul>
      @php
          $categoriaAtual = "";
          $iniciar = 0;
          $categoriaAtual1 = "";
          $SubCategoriaAtual = "";
      @endphp
  
      @foreach ($categorias as $tipos)
  
      @if ($iniciar != 0)
            @if ($categoriaAtual1 != $tipos->categoria)
              </ul>
              </li>
            @endif
          @endif
  
          @if ($categoriaAtual != $tipos->categoria)
            <li><a href="#">{{ $tipos->categoria }}</a>
            <ul>
          @endif
                  <li><a href="{{ asset('') }}pesquisar/{{ $tipos->id }}">{{ $tipos->subcategoria }}</a></li>
          @php
              $categoriaAtual = $tipos->categoria;
              $categoriaAtual1 = $tipos->categoria;
              $SubCategoriaAtual = $tipos->subcategoria;
              $iniciar = 1;
          @endphp
      @endforeach
    </ul>
  </nav>
  </center>

<br><br>

<!-- filtro d e produtos -->
<div class="container">
    <form action="{{ route('search') }}" method="post">
      @csrf
      <input type="search" id="buscar" name="buscar" placeholder="Filtrar: ">
      <button type='submit' class="btn black-effect black">Pesquisar</button>
  </form>
</div>


      <div id="produtos">
        @if ($produto == "Nenhum produto encontrado")
            
        <h1>Nenhum produto encontrado na Categoria</h1>
            
        @else
            
        @foreach($produto as $produtos)
        <div class="produtos-single">
            <center>
              {{-- <img src="{{ $produtos['IMAGEM'] }}`" widht='400px' height='200px'/> --}}

              @php
                        $Slide = explode('\,', $produtos->IMAGEM);
                        array_pop($Slide);
                    @endphp

                    <div class="slider">
                      <ul class="slides">
                        @foreach ($Slide as $item)
                          <li>
                            <img src="{{ asset($item) }}"> <!-- random image -->
                            <div class="caption center-align">
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    </div>

            </center>
            <p class="limitar">{{ $produtos->NOME }}</p>
            <a href="{{ asset('') }}ClienteProduto/{{ $produtos->id }}"> Selecionar </a>
            </div>
          @endforeach

        @endif
        
      </div>

      @if ($produto == "Nenhum produto encontrado")
        <h2 style="display: none">nada aqui</h2>
        @else
        <div class='center'>
          {{ $produto->links('shared.paginacao') }}
       </div>
      @endif

      @include('templateFront.footer')
      


</body>

<script>
  $(document).ready(function(){
            $('.slider').slider();
          });
</script>

<script>
	$(document).ready(function(){
 		$('.sidenav').sidenav();
 	});
</script>
</html>
      
