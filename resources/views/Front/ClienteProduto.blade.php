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
<nav class="white" style="padding:0px 10px; position: fixed;  z-index:1111;  height: 15% !important;">
	<div class="nav-wrapper">
    <a href="{{ route('ClienteHome') }}" class="brand-logo"> <img src="Fimg/logot.png" alt="logo"> </a>

		<a href="#" class="sidenav-trigger" data-target="mobile-nav">
			<i class="material-icons">menu</i>
		</a>

		<ul class="right hide-on-med-and-down" >
    <li><a href="{{ route('ClienteHome') }}">Início</a></li>
			<li><a href="{{ route('ClienteProduto') }}">Produtos</a></li>
			<li><a href="{{ route('contato') }}">Contato</a></li>
      <li><a href="{{ route('sobre') }}">Nossa Empresa</a></li>
			<li><a href="{{ route('login') }}">Entrar</a></li>
		</ul>
	</div>
</nav>

<ul class="sidenav" id="mobile-nav" style="z-index:1112;">
	    <li><a href="{{ route('ClienteHome') }}">Início</a></li>
			<li><a href="{{ route('ClienteProduto') }}">Produtos</a></li>
			<li><a href="{{ route('contato') }}">Contato</a></li>
      <li><a href="{{ route('sobre') }}">Nossa Empresa</a></li>
			<li><a href="{{ route('login') }}">Entrar</a></li>
</ul>

<script src="Fjs/main.js"></script>  

<br><br><br><br>

<div class="text-principal">
      <h2>Peças e Produtos</h2>
      <hr class="hr1">
</div>

<!-- filtro d e produtos -->
<div class="container">
    <form action="{{ route('search') }}" method="post">
      @csrf
      <input type="search" id="buscar" name="buscar" placeholder="Filtrar: ">
      <button type='submit' class="btn black-effect black">Pesquisar</button>
  </form>
</div>


      <div id="produtos">

      </div>

        
      <div class='center'>
      {{ $produto->links('shared.paginacao') }}
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

<script>
	$(document).ready(function(){
 		$('.sidenav').sidenav();
 	});
</script>
</html>
      
