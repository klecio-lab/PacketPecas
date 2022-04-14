<nav class="black" style="padding:0px 10px; position: fixed; z-index: 1111;">
	<div class="nav-wrapper">
    <a href="{{ route('ClienteHome') }}" class="brand-logo"> <img src="Fimg/LogoBranca.png" alt="logo"> </a>

		<a href="#" class="sidenav-trigger" data-target="mobile-nav">
			<i class="material-icons">menu</i>
		</a>

		<ul class="right hide-on-med-and-down "  >
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li><a href="{{ route('AddProd') }}">Adicionar</a></li>
			<li><a href="{{ route('Products') }}">Produtos</a></li>
			<li><a href="{{ route('Pedidos') }}">Pedidos</a></li>
      <li><a href="{{ route('Geral') }}">Geral</a></li>
      <li><form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                      this.closest('form').submit();">
          {{ __('Sair') }}
    </a>
  </form></li>
		</ul>
	</div>
</nav>

<ul class="sidenav" id="mobile-nav">
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li><a href="{{ route('AddProd') }}">Adicionar</a></li>
			<li><a href="{{ route('Products') }}">Produtos</a></li>
			<li><a href="{{ route('Pedidos') }}">Pedidos</a></li>
      <li><a href="{{ route('Geral') }}">Geral</a></li>
      <li><form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                  this.closest('form').submit();">
      {{ __('Sair') }}
      </a>
      </form></li>
</ul>
<br><br><br><br>