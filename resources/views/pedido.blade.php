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
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

<!-- sidenav -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var options = {
            data: {
            @foreach($codigos as $valores)
            "{{ $valores['CODIGO'] }}": "{{ $valores['IMAGEM'] }}",
            @endforeach
            "Google": 'logot.svg'
        }
      };
    var elems = document.querySelectorAll('.autocomplete');
    var instances = M.Autocomplete.init(elems, options);
  });
 </script>

 <script>
   document.getElementById("preco").addEventListener("change", function(){
   this.value = parseFloat(this.value).toFixed(2);
});
 </script>

      <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pagina de Produtos</title>
</head>
<body>

@include('templates.navbar')
    <center>
    <img src="{{ asset('Fimg/logot.png') }}"  alt="">
    <div class="row container center">
        <form class="col s12" enctype="multipart/form-data" method="post" action="{{ route('Finalizar') }}" >
            <div class="row">
            @csrf
            @if(isset($cliente))
                {{-- Nome --}}
                    <div class="input-field col s8">
                        <input  id="nomeCliente" name='nomeCliente' value="{{ $cliente['nomeCliente'] }}" type="text" required minlength="2" class="validate">
                        <label for="nomeCliente">Nome</label>
                    </div>

                    {{-- Telefone --}}
                    <div class="input-field col s4">
                        <input id="numero" name='numero'  type="tel" value="{{ $cliente['numero'] }}" required pattern="[0-9]+$" required min="1" max="999999999999999" class="validate">
                        <label for="numero">Numero do CLiente</label>
                    </div>

                    {{-- Email do Cliente --}}
                    <div class="input-field col s12">
                        <input id="emailCliente" name='emailCliente' value="{{ $cliente['emailCliente'] }}" type="email" required minlength="2" class="validate">
                        <label for="emailCliente">Email</label>
                    </div>
                  
                    {{-- select produtos --}}
                    <div class="input-field col s4">
                      <i class="material-icons prefix">textsms</i>
                      <input type="text" id="autocomplete-input" value="{{ $cliente['autocomplete'] }}" name="autocomplete" class="autocomplete">
                      <label for="autocomplete-input">Código Produto</label>
                    </div>
                  

                  @foreach($busca as $buscado)
                    {{-- preço produtos --}}
                    <div class="input-field col s4">
                        <input id="preco" name='preco'  value="{{ $buscado['PRECO'] }}"  type="number" step="any" required pattern="[0-9]+$" required min="1" max="999999999999999" class="validate">
                        <label for="preco">Preço do Produto</label>
                    </div>
              @endforeach

                {{-- quantidade de produtos --}}
                <div class="input-field col s4">
                    <input id="quantidade" name='quantidade'  type="number" value='1'  required pattern="[0-9]+$" required min="1" max="999999999999999" class="validate">
                    <label for="quantidade">Quant. de Produtos</label>
                </div>

              @else


            {{-- Nome --}}
                <div class="input-field col s8">
                    <input  id="nomeCliente" name='nomeCliente' type="text" required minlength="2" class="validate">
                    <label for="nomeCliente">Nome</label>
                </div>

                {{-- Telefone --}}
                <div class="input-field col s4">
                    <input id="numero" name='numero'  type="tel" required pattern="[0-9]+$" required min="1" max="999999999999999" class="validate">
                    <label for="numero">Numero do CLiente</label>
                </div>

                {{-- Email do Cliente --}}
                <div class="input-field col s12">
                    <input id="emailCliente" name='emailCliente' type="email" required minlength="2" class="validate">
                    <label for="emailCliente">Email</label>
                </div>
               
                {{-- select produtos --}}
                <div class="input-field col s4">
                  <i class="material-icons prefix">textsms</i>
                  <input type="text" id="autocomplete-input" name="autocomplete" class="autocomplete">
                  <label for="autocomplete-input">Código Produto</label>
                </div>

                {{-- preço produtos --}}
                <div class="input-field col s4">
                    <input id="preco" name='preco' type="number"  step="0.010" value='1' required pattern="[0-9]+$" required min="1" max="999999999999999" class="validate">
                    <label for="preco">Preço do Produto</label>
                </div>

                {{-- quantidade de produtos --}}
                <div class="input-field col s4">
                    <input id="quantidade" name='quantidade'  type="number" value='1' required pattern="[0-9]+$" required min="1" max="999999999999999" class="validate">
                    <label for="quantidade">Quant. de Produtos</label>
                </div>

              @endif

                {{-- botão de envio produtos --}}
                <button onclick="myFunction()" class="btn waves-effect black"  type="submit">Finalizar
                    <i class="material-icons right">send</i>
                </button>

                {{-- botão de envio produtos --}}
                <button onclick="myFunction()" class="btn waves-effect black" type="submit" formaction="{{ route('Addpedido') }}" >Adicionar
                    <i class="material-icons right">add_shopping_cart</i>
                </button>

                {{-- botão de atualizar produtos --}}
                <button onclick="myFunction()" class="btn waves-effect black" type="submit" formaction="{{ route('atualizar') }}" >Atualizar
                    <i class="material-icons right">refresh</i>
                </button>
            
        </form>
    </div>
    </div></center>

    @include('templates.footer')
    
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

<script>
          $(document).ready(function(){
            $('.sidenav').sidenav();
          });
        </script>

</html>