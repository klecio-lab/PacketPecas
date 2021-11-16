<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
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

    <link rel="shortcut icon" href="Fimg/logoGrande.png" />
      
    <!-- sidenav -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

</head>
<body>

<nav class="white" style="padding:0px 10px; position: fixed;  z-index:1111;  height: 15% !important;">
	<div class="nav-wrapper">
    <a href="{{ route('ClienteHome') }}" class="brand-logo"> <img src="Fimg/logot.png" alt="logo"> </a>

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

<ul class="sidenav" id="mobile-nav"  style="z-index:1112;">
	        <li><a href="{{ route('ClienteHome') }}">Início</a></li>
			<li><a href="{{ route('ClienteProduto') }}">Produtos</a></li>
			<li><a href="{{ route('contato') }}">Contato</a></li>
            <li><a href="{{ route('sobre') }}">Nossa Empresa</a></li>
			<li><a href="{{ route('login') }}">Entrar</a></li>
</ul>

    <br><br><br>


      <br><br>

    <div class="row container center">    
          <div class="col s12 m6 l6">
          <h1 align="center">Nossa Empresa</h1>
          <p style="">Oferencendo total suporte aos clientes, a Packet Peças e Serviços, é uma empresa autorizada Indumak, localizado no estado de Pernambuco, onde atende toda região do Nordeste, a nossa empresa está estrategicamente posicionada para facilitar os processos de distribuição de peças, com o estoque repleto de peças para reposição, dispomos no nosso estoque, tudo que vocês precisam.
seja itens: PNEUMÁTICOS, ELÉTRICOS, MECÂNICOS e INSUMOS. 
Tudo isso para minimizar seus custos operacionais, reduzir tempo de máquinas paradas e garantir o máximo de desempenho da sua produção.</p>
          </div>
          <div class="col s12 m6 l6" style="margin-top:100px" >
          <img src="Fimg/logoGrande.png" alt="" width="200px" height="200px">
          </div>
    </div>


  <footer>
        <div class="footer-content">
          <img src="{{ asset('Fimg/LogoFooter.png') }}" alt="logo">
            <p class="footer-h2">Facilidade e segurança para tornar seu processo mais eficiente, conte com a confiança desta parceria.</p>
            <ul class="socials">
                <li><a href="https://www.instagram.com/packetpecas/"><i class="fa fa-instagram"></i></a></li>
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
        numero = "558198995121"
        var edit = `https://api.whatsapp.com/send?phone=${numero}&text=${encoded} `
        location.href = edit
    }
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

<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
</html>