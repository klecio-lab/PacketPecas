<!DOCTYPE html>
<html lang="pt-br">
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

<!-- sidenav -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>
    $(document).ready(function(){
    $('select').formSelect();
  });
</script>

</head>
<body>

@include('templates.navbar')

<center>
    <img src="{{ asset('Fimg/logot.png') }}" alt="">
</center>

    <div class="row container center">
        <form class="col s12" name="produtoForm" id="produtoForm" enctype="multipart/form-data" method="post" action="{{ route('products.update') }}" >
            <div class="row">
            @csrf
            {{-- nome do produtos --}}
                <div class="input-field col s12 l12">
                    <input  id="nome" name='nome' value="@php  if (isset($dados)) {echo $dados[1];} @endphp" type="text" required minlength="2" class="validate">
                    <label for="nome">Nome do Produto</label>
                </div>

                {{-- descrição produtos --}}
                <div class="input-field col s12 l12">
                    <textarea id="descricao" name='descricao' type='text' value="" class="materialize-textarea" required minlength="2">@php  if (isset($dados)) {echo ($dados[2]);} @endphp</textarea>
                    <label for="descricao">Descrição do Produto</label>
                </div>

                {{-- preço produtos --}}
                <div class="input-field col s12 l2">
                    <input id="preco" name='preco' value="@php  if (isset($dados)) {echo $dados[3];} @endphp" type="number" required pattern="[0-9]+$" required min="-1" step="any" max="999999999999999" class="validate">
                    <label for="preco">Preço do Produto</label>
                </div>

                {{-- codigo produtos --}}
                <div class="input-field col s12 l2">
                    <input id="codigo" name='codigo' value="@php  if (isset($dados)) {echo $dados[4];} @endphp" type="number" class="validate" required pattern="[0-9]+$" required min="-1" max="999999999999999" >
                    <label for="codigo">Código do Produto</label>
                </div>

                <div class="input-field col s12 l4">
                  {{-- filtro de categoria --}}
                  <select id="selectCategoria"  name="selectCategoria" class="form-select" aria-label="Default select example">
                      <option selected value='0' disabled>Selecione a Categoria</option>
                      @foreach ($categoria as $categorias)
                        <option value="{{ $categorias->id }}">{{ $categorias->categoria }}</option>
                      @endforeach
                  </select>
                  <label>Selecione a Categoria</label>
                </div>

                <div class="input-field col s12 l4">
                  <select id="subcategoria" @if($subcategoriaFiltro == null) disabled @endif name="subcategoria">
                    <option value="0" required  disabled selected>Choose your option</option>
                    @if($subcategoriaFiltro != null)
                        @foreach($subcategoriaFiltro as $valores)
                          <option value="{{ $valores->id }}">{{ $valores->subcategoria }}</option>
                        @endforeach
                      @endif
                  </select>
                  <label>Selecione Sua Subcategoria</label>
                </div>

                {{-- upload imagem produtos --}}
                <div class = "input-field col s12 l12">
                    <label>Carregue Sua Imagem</label>
                    <div class = "file-field input-field">
                        <div class = "btn black">
                            <span>Buscar</span>
                            <input type="file"  accept="image/svg, image/png, image/jpeg, image/jpg" id='imagem' required name="imagem[]" multiple />
                        </div>
                        <div class = "file-path-wrapper">
                            <input class = "file-path validate s4" type = "text" placeholder = "Carregue sua Imagem" style="color: green" />
                        </div>
                    </div>
                </div>

                {{-- botão de envio produtos --}}
                <button onclick="myFunction()" class="btn waves-effect black" type="submit">Cadastrar
                    <i class="material-icons right">send</i>
                </button>
            
        </form>
    </div>
    </div>

    @include('templates.footer')

</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function () {
   $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });
});
</script>

<script>
  $(document).ready(function() {
    $('#selectCategoria').change(function() {
      var varURL = $("option:selected", this).val();
      var nome = document.getElementById("nome").value;
      var descricao = encodeURIComponent(document.getElementById("descricao").value);
      var preco = document.getElementById("preco").value;
      var codigo = document.getElementById("codigo").value;
      var url =  `{{ asset('') }}Adicionar/${varURL}!;${nome}!;${descricao}!;${preco}!;${codigo}`;
      location.href = url;
      });
    });
</script>


<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>

</html>



