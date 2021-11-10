{{--<x-app-layout>--}}
  {{--
    <x-slot name="header">

    </x-slot>--}}

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dashboard</title>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            <style>
              .rodape{
                position: absolute;
                bottom: 0px;
                width: 100%
              }
            </style>
              <!-- sidenav -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
              <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              
          </head>
        <body>

<nav class="black" style="padding:0px 10px; position: fixed;">
	<div class="nav-wrapper">
    <a href="{{ route('ClienteHome') }}" class="brand-logo"> <img src="{{ asset('Fimg/logoBranca.png') }}" alt="logo"> </a>

		<a href="#" class="sidenav-trigger" data-target="mobile-nav">
			<i class="material-icons">menu</i>
		</a>

		<ul class="right hide-on-med-and-down "  >
    <li><a href="{{ route('AddProd') }}">Início</a></li>
			<li><a href="{{ route('Products') }}">Produtos</a></li>
			<li><a href="{{ route('contato') }}">Contato</a></li>
			<li><a href="{{ route('login') }}">Entrar</a></li>
		</ul>
	</div>
</nav>

<ul class="sidenav" id="mobile-nav">
	    <li><a href="{{ route('ClienteHome') }}">Início</a></li>
			<li><a href="{{ route('ClienteProduto') }}">Produtos</a></li>
			<li><a href="{{ route('contato') }}">Contato</a></li>
			<li><a href="{{ route('login') }}">Entrar</a></li>
</ul>

        <!-- <h1 align="center" >Dashboard</h1> -->
{{--
<div class="row container">
      
        <!-- <pre>    </pre> -->
      <div class="col s12 m6 l6">
        <div class="card text-white bg-success mb-12">
          <div class="card-header">Quantidade de Pedidos</div>
            <div class="card-body">
              <h5 class="card-title">{{ $QuantidadePedidos }}<i class="material-icons medium" style="float: right;">insert_chart</i></h5>
              <p class="card-text">Total de Pedidos</p>
            </div>
          </div>
        </div>
      </div>
  <!-- <pre>    </pre> -->
  <div class="col s12 m6 l6">
    <div class="card text-white bg-dark mb-12">
      <div class="card-header">Quantidade de Produtos</div>
        <div class="card-body">
          <h5 class="card-title">{{ $QuantidadeProdutos }} <i class="material-icons medium" style="float: right;">tune</i></h5>
          <p class="card-text">Total de Produtos </p>    
        </div>
      </div>
  </div>
</div> --}}


                    <!-- <pre>    </pre> -->

    <footer class="page-footer center black rodape">
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

        <script>
          $(document).ready(function(){
            $('.sidenav').sidenav();
          });
        </script>

<script type="text/javascript">
		var chr=document.getElementById("myChart").getContext("2d");
		var chr2=document.getElementById("myChart2").getContext("2d");
		var myChart=new Chart(chr,{
			type:'bar',
			data:{
				labels:['january','febuary','march','april','mei','juni','juli'],
				datasets:[{
					label:'Data Visitor',
					data:[1100,1250,1090,1400,1150,1450,1107],
					backgroundColor:'rgba(0,0,0,0)',
					borderColor:'#fff',
					borderWidth:1,
				}]
			},
			options:{
				legend:{
					labels:{
						fontColor:'#fff',
					}

				}
			}
		});
		var myChart2=new Chart(chr2,{
			type:'line',
			data:{
				labels:['Monday','Tuesday','Wednesday','Thursday','fiday'],
				datasets:[{
					label:'Data Users',
					data:[100,512,150,120,190],
					backgroundColor:'rgba(0,0,0,0)',
					borderColor:'#fff',
					borderWidth:1,
				}]
			},
			options:{
				legend:{
					labels:{
						fontColor:'#fff',
					}
				}
			}
		});
	</script>


    </html>
    <br>
{{--</x-app-layout>--}}
