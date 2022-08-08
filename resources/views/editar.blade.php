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

              <script>
                $(document).ready(function(){
                $('select').formSelect();
              });
            </script>
          
</head>
<body>

  @include('templates.navbar')

    <center>
    <img src="{{ asset('Fimg/logot.png') }}"  alt="não carreguei">

    <div class="row container center">
        <form class="col s12" enctype="multipart/form-data" method="post" action="{{ route('editarRegName') }}" >
            <div class="row">
            @csrf
                {{-- nome do produtos --}}
                <div class="input-field col s10">
                    <input  id="nome" name='nome' type="text" class="validate" required minlength="2" value="@if (isset($dados)) {{ $dados[1] }} @else {{ $valores['NOME'] }}@endif">
                    <label for="nome">Nome do Produto</label>
                </div>

                {{-- id do produtos --}}
                <div class="input-field col s2">
                    <input  id="id" name='id' type="text" class="validate"readonly value="@if (isset($dados)) {{ $dados[2] }} @else {{ ($valores['id']) }} @endif">
                    <label for="id">ID do Produto</label>
                </div>

                {{-- descrição produtos --}}
                <div class="input-field col s12">
                    <textarea id="descricao" name='descricao' type='text' value="" class="materialize-textarea" required minlength="2">@if (isset($dados)) {{ $dados[3] }} @else {{ ($valores['DESCRICAO']) }} @endif"</textarea>
                    <label for="descricao">Descrição do Produto</label>
                </div>

                {{-- preço produtos --}}
                <div class="input-field col s12 l2">
                  <input id="preco" name='preco'  value="@if(isset($dados)){{ $dados[4] }}@else{{ ($valores['PRECO']) }}@endif" type="number" required pattern="[0-9]+$" required min="-1" step="any" max="999999999999999" class="validate">
                  <label for="preco">Preço do Produto</label>
              </div>

              {{-- codigo produtos --}}
              <div class="input-field col s12 l2">
                  <input id="codigo" name='codigo' value="@if(isset($dados)){{ $dados[5] }}@else{{ $valores['CODIGO'] }}@endif" type="number" class="validate" required pattern="[0-9]+$" required min="-1" max="999999999999999" >
                  <label for="codigo">Código do Produto</label>
              </div>

              <div class="input-field col s12 l4">
                {{-- filtro de categoria --}}
                <select id="selectCategoria"  name="selectCategoria" class="form-select" aria-label="Default select example">
                    <option selected value="{{$categoriaAUX}}">@php  if (isset($categoriaAUX)) {echo $categoriaAUX;}else{echo "Selecione sua Categoria";} @endphp</option>
                    @foreach ($categoria as $categorias)
                      <option value="{{ $categorias->id }}">{{ $categorias->categoria }}</option>
                    @endforeach
                </select>
                <label>Selecione a Categoria</label>
              </div>

              <div class="input-field col s12 l4">
                <select id="subcategoria" @if($subcategoriaFiltro == null) disabled @endif name="subcategoria">
                  <option value="@php  if (isset($subCategoriaName)) {$subCategoriaId;}@endphp" required  disabled selected>@php  if (isset($subCategoriaName)) {echo $subCategoriaName;}else{echo "Selecione sua SubCategoria";} @endphp</option>
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
                          <input type="file"  accept="image/svg, image/png, image/jpeg, image/jpg" id='imagem' name="imagem[]" multiple />
                      </div>
                      <div class = "file-path-wrapper">
                          <input class = "file-path validate s4" type = "text" placeholder = "Carregue sua Imagem" style="color: green" />
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

    @include('templates.footer')
        
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function() {
    $('#selectCategoria').change(function() {
      var varURL = $("option:selected", this).val();
      var nome = document.getElementById("nome").value;
      var id = document.getElementById("id").value;
      var descricao = encodeURIComponent(document.getElementById("descricao").value);
      var preco = document.getElementById("preco").value;
      var codigo = document.getElementById("codigo").value;
      var url =  `{{ asset('') }}editarCategoria/${varURL}!;${nome}!;${id}!;${descricao}!;${preco}!;${codigo}`;
      location.href = url;
      });
    });
</script>


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
