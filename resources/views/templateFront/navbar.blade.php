<nav class="white" style="padding:0px 20px; position: fixed; z-index:1111; height: 15% !important; width: 100% !important;">
	<div class="nav-wrapper">
    <a href="{{ route('ClienteHome') }}" class="brand-logo"> <img src="Fimg/logot.png" alt="logo"> </a>

		<a href="#" class="sidenav-trigger" data-target="mobile-nav">
			<i class="material-icons">menu</i>
		</a>

		<ul class="right hide-on-med-and-down"  >
    <li><a href="{{ route('ClienteHome') }}">Início</a></li>
			<li><a href="{{ route('ClienteProduto') }}">Produtos</a></li>
			<li><a href="{{ route('contato') }}">Contato</a></li>
      <li><a href="{{ route('sobre') }}">Nossa Empresa</a></li>
			<li><a href="{{ route('login') }}">Entrar</a></li>
      <li><a href="https://www.instagram.com/packetpecas/"><i class="fa fa-instagram"></i></a></li>
		</ul>
	</div>
</nav>

<ul class="sidenav" id="mobile-nav" style="z-index:1112;">
	    <li><a href="{{ route('ClienteHome') }}">Início</a></li>
			<li><a href="{{ route('ClienteProduto') }}">Produtos</a></li>
			<li><a href="{{ route('contato') }}">Contato</a></li>
      <li><a href="{{ route('sobre') }}">Nossa Empresa</a></li>
			<li><a href="{{ route('login') }}">Entrar</a></li>
      <li><a href="https://www.instagram.com/packetpecas/"><i class="fa fa-instagram"></i></a></li>
</ul>