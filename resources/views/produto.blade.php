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

      <!-- sidenav -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
              <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Pagina de Produtos</title>
</head>
<body>

  @include('templates.navbar')
  
<center>
<img src="{{ asset('Fimg/logot.png') }}" alt="">
</center>
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
        <div class="col s12 m4 l4">
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
       <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    {{-- <img class="activator" style='width: 240px; height: 240px;' src="{{ $produto['IMAGEM'] }}" alt='não funciona' /> --}}

                    @php
                        $Slide = explode('\,', $produto['IMAGEM']);
                        array_pop($Slide);
                    @endphp

                    <div class="slider">
                      <ul class="slides">
                        @foreach ($Slide as $item)
                          <li>
                            <img src="{{ $item }}"> <!-- random image -->
                            <div class="caption center-align">
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                    
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

@include('templates.footer')

        <script>
          $(document).ready(function(){
            $('.sidenav').sidenav();
          });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems, options);
          });

          // Or with jQuery

          $(document).ready(function(){
            $('.slider').slider();
          });
        
        </script>


</html>