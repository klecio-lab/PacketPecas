<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>contato</title>
    <link rel="stylesheet" href="Fcss/mainProdutos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<header>
        <nav>
         <a href="index.html"> <img src="Fimg/logoBranca.png" alt="logo"> </a>
          <div class="mobile-menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
          </div>
          <ul class="nav-list">
            <li><a href="{{ route('ClienteHome') }}">Início</a></li>
            <li><a href="{{ route('ClienteProduto') }}">Produtos</a></li>
            <li><a href="{{ route('contato') }}">Contato</a></li>
            <li><a href="{{ route('login') }}">Entrar</a></li>
          </ul>
        </nav>
      </header>
      <script src="Fjs/main.js"></script>   

    <h1 align="center">Pagina de Contato</h1>
    <center>
<div class="row container">
    <form class="col s12">

        <div class="input-field col s6">
            <input  id="first_name" type="text" class="validate" required>
            <label for="first_name">Seu Nome</label>
        </div>


        <div class="input-field col s6">
          <input id="email" type="email" class="validate" required>
          <label for="email">Email</label>
        </div>


        <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" required ></textarea>
            <label for="textarea1">Textarea</label>
        </div>

    </form>
</div>
</center>

<center>
<button class="btn waves-effect black" type="" onclick="Enviar()" name="action">Submit
                <i class="material-icons right">send</i>
        </button>
        </center>
  <footer>
        <div class="footer-content">
          <img src="{{ asset('Fimg/LogoFooter.png') }}" alt="logo">
            <p class="footer-h2">Facilidade e segurança para tornar seu processo mais eficiente, conte com a confiança desta parceria.</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/packetpecas/"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
      </footer>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
    function Enviar()
    {
        var nome = document.querySelector("#first_name").value;
        var email = document.querySelector("#email").value;
        var mensagem = document.querySelector("#textarea1").value;

        uri = `Contato \n———————\n Nome:${nome} \n Email: ${email} \n Mensagem: ${mensagem};`
        const encoded = encodeURI(uri);
        numero = "5581995247120"
        var edit = `https://api.whatsapp.com/send?phone=${numero}&text=${encoded} `
        location.href = edit

    }
</script>
</html>