<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Fcss/main.css">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>


<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

<!-- sidenav -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<title>PacketPecas</title>

</head>
<body>

<nav class="black" style="padding:0px 10px; position: fixed; z-index:1111;">
	<div class="nav-wrapper">
    <a href="{{ route('ClienteHome') }}" class="brand-logo"> <img src="Fimg/LogoBranca.png" alt="logo"> </a>

		<a href="#" class="sidenav-trigger" data-target="mobile-nav">
			<i class="material-icons">menu</i>
		</a>

		<ul class="right hide-on-med-and-down "  >
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
<!-- <script src="Fjs/main.js"></script>    -->

<center>
<div class="row center" style="background-image: url({{ asset('Fimg/maquina3.png') }}); height:auto; width: 100%;">
  <div class="col s12 m6 l6">
      <div style="">   
          <h2 style="float: left;text-align: left; margin-top: 170px;">
          <p style="font-size: 22px"><b>
          Somos a <span>Packet Peças</span>, uma loja autorizada <span>INDUMAK.</span>
          Facilidade e segurança para tornar seu processo mais
          eficiente, conte com a confiança desta parceria.
          <pre><a href="{{ route('ClienteProduto') }}"><button class="button button1">Produtos</button></a><a href="#"><button class="button button2">Fale Conosco</button></a></pre></p></h2>
          </b>
        </div>
  </div>

  <div class="col s12 m6 l6">
    <img  class="" style="margin-top: 120px;" src="Fimg/logoGrande.png" alt="logo">
  </div>

</div>

</center>
          <br><br>
      <div class="row center">

          <div class="col s12 m6 l3">
              <img src="Fimg/qualidade.png" alt="qualidade">
              <h3> Qualidade OEM </h3>
              <p> Padrões rigorosos para garantir segurança e confiabilidade </p>
          </div>

          <div class="col s12 m6 l3">
            <img src="Fimg/expertise.png" alt="expertise">
            <h3> Expertise </h3>
            <p> Sempre projetando e fornecendo equipamentos e peças robustas</p>
          </div>

          <div class="col s12 m6 l3">
            <img src="Fimg/disponibilidade.png" alt="disponibilidade">
            <h3>Disponibilidade</h3>
            <p> Sempre com disponibilidade para fornecemos peças onde e quando você precisar</p>
          </div>

          <div class="col s12 m6 l3">
            <img src="Fimg/Soluções.png" alt="soluções">
            <h3>Soluções de ponta a ponta</h3>
            <p> Peças originais, Peças de terceiros e até kits completos, podemos oferecer suporte ao seu processo </p>
           </div>

       </div>
       <hr>

       <h1 align="center">Nossos Segmetos</h1>
        <div class="carousel">
            <br>
            <button><a class="carousel-item" href="{{ route('ClienteProduto') }}"><img src="Fimg/TeflonAdesivo.jpg"><p align="center">Teflon Adesivo</p></a>
            <a class="carousel-item" href="{{ route('ClienteProduto') }}"><img src="Fimg/Transformador.jpg"><p align="center">Transformador</p></a>
            <a class="carousel-item" href="{{ route('ClienteProduto') }}"><img src="Fimg/FitaDeDatador.jfif"><p align="center">Fita de Datador</p></a>
            <a class="carousel-item" href="{{ route('ClienteProduto') }}"><img src="Fimg/AcopladorRele.jpg"><p align="center">Acoplador a Rele</p></a></button>
      </div>
    
    <center>
      <button class="prev btn black"><i class="material-icons">navigate_before</i> </button>
      <button class="next btn black"><i class="material-icons">navigate_next</i> </button>
      </center>

       
       <!-- parte do serviçosa -->
       <br>
          <div class="titulo">
            <center>
            <p>
            <h2 class="black-title">Peças e Serviços</h2> <br>
            <h2 class="black-title2"><span> Encontre aqui peças e serviços para sua indústria</span></h2>
            </p>
            </center>
          </div>
          <br>


        <div class="row center">
            <div class="col s12 m6 l6">
                <a href="{{ route('ClienteProduto') }}">
                <img class="peças-1" src="Fimg/peças.png" alt="Peças" width="500" height="300">
                <div class="button button4 ">Peças de reposição</div></a>
            </div>

            <div class="col s12 m6 l6">
              <a href="https://api.whatsapp.com/send?phone=5581998995121&text=estou%20testando%20a%20api%20de%20enviar%20mensagem%20via%20whatzap%20">
              <img  class="peças-1" src="Fimg/homemTrabalhando.png" alt="Trabalho" width="500" height="300">
              <div class="button button4">Serviços para manutenção</div></a>
            </div>
        </div>

        <div class="maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.4347507222374!2d-34.82786795547711!3d-7.902640792605967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab3e51ab2c8073%3A0x928bfe5873f7c744!2sAv.%20Dr.%20Cl%C3%A1udio%20Jos%C3%A9%20Gueiros%20Leite%2C%206363%20-%20Pau%20Amarelo%2C%20Paulista%20-%20PE%2C%2053431-165!5e0!3m2!1spt-BR!2sbr!4v1626364415136!5m2!1spt-BR!2sbr" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
       </div>

      
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
<script>
      $(document).ready(function(){
    $('.carousel').carousel();
  });

  $('.prev').click(function(){
      $(".carousel").carousel("prev");
  })

  $('.next').click(function(){
      $(".carousel").carousel("next");
  })

</script>
</html>