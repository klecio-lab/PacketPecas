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
    {{-- materialize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <title>Geral</title>
</head>
<body>
<div  id="dados" class="row 12">
    <div class="row 10">
        <table class="bordered striped centered">
            <thead>
            <tr class="white-text text-darken-2 grey black">
                <th>Nome</th>
                <th id="edit">Editar</th>
            </tr>
        </thead>


            <tbody>
            @foreach($geral as $gerals)
                <tr>
                    <td>{{ $gerals['nomeCliente'] }}</td>
                    <td id="botao"><button onclick="editarGeral('{{ $gerals['nomeCliente'] }}')" class="btn-floating btn-small waves-effect waves-light black"><i class="material-icons">create</i></button> <button class="btn-floating btn-small waves-effect waves-light red" onclick="excluirProdGeral('{{ $gerals['nomeCliente'] }}')"><i class="material-icons">delete</i></button></td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

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
<script src="{{ asset('botoes.js') }}"></script>
</html>

</x-app-layout>