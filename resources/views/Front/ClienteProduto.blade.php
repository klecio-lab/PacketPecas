<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Fcss/mainProdutos.css') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

  <style>
              .limitar {
            max-width: 25ch;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            }
  </style>

    <title>Document</title>
</head>
<body>
    <header>
        <nav>
         <a href="index.html"> <img src="Fimg/LogoBranca.png" alt="logo"> </a>
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

<div class="text-principal">
      <h2>Peças e Produtos</h2>
      <hr class="hr1">
</div>

      <div id="produtos">

      </div>

      <div class="sidenav">
        <a href="#">FILTROS</a>
        <hr class="hr2">
        <button class="dropdown-btn">LINHAS DE PRODUTOS
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="#">Produto 1</a>
            <a href="#">Produto 2</a>
            <a href="#">Produto 3</a>
            <a href="#">Produto 4</a>
            <a href="#">Produto 5</a>
            <a href="#">Produto 6</a>
            <a href="#">Produto 7</a>
            <a href="#">Produto 8</a>
            <a href="#">Produto 9</a>
          </div>
        <button class="dropdown-btn">POR PEÇAS
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="#">Peça 1</a>
          <a href="#">Peça 2</a>
          <a href="#">Peça 3</a>
          <a href="#">Peça 4</a>
          <a href="#">Peça 5</a>
          <a href="#">Peça 6</a>
          <a href="#">Peça 7</a>
          <a href="#">Peça 8</a>
          <a href="#">Peça 9</a>
        </div>
      </div>

      <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        
        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var dropdownContent = this.nextElementSibling;
          if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
          } else {
          dropdownContent.style.display = "block";
          }
          });
        }
        </script>

      <script>
      
       const items = [
        @foreach($produto as $produtos)
           {
               id: {{ $produtos['id'] }},
               nome: '{{ $produtos['NOME'] }}',
               img: "{{ $produtos['IMAGEM'] }}",
               quantidade: 0
           },
      @endforeach

       ]

       inicializarLoja = () => {
           var containerProtudos = document.getElementById('produtos');
           items.map((val)=>{
               containerProtudos.innerHTML+=`
               
               <div class="produtos-single">
               <center>
                <img src="`+val.img+`" widht='400px' height='200px'/>
                </center>
                <p class="limitar">`+val.nome+`</p>
                <a href="ClienteProduto/${val.id}"> Selecionar </a>
                </div>
               `;

           })
       }
       inicializarLoja();

      </script>


<footer>
  <div class="footer-content">
    <img src="Fimg/LogoFooter.png" alt="logo">
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
</html>
      
