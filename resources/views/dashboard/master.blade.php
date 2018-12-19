<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body>
	{{-- Navegación --}}
	<nav>
		<div>
			<a href="{{ url('/escritorio/usuario/' . Auth::user()->id) }}">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a>
			<a href="{{ url('/escritorio') }}"><i class="fas fa-tachometer-alt"></i></a>
			<a href="{{ url('/') }}" target="_blank"><i class="fas fa-home"></i></a>
			<a href="{{ url('/autenticacion/cerrar-sesion') }}"><i class="fas fa-power-off"></i></a>
		</div>
	</nav>
	{{-- Menú --}}
	<aside>
		<div>
			<h1>Escritorio</h1>
		</div>
		<ul>
			<li><span>Generales</span></li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/usuarios')) class="active" @endif
					@if(Route::is('escritorio/editar')) class="active" @endif
				><span class="fas fa-users-cog"></span> Usuarios</a>
				<ul
					@if(Route::is('escritorio/usuarios')) class="show" @endif
					@if(Route::is('escritorio/editar')) class="show" @endif
				>
					<li><a
						@if(Route::is('escritorio/usuarios')) class="active" @endif
						@if(Route::is('escritorio/editar')) class="active" @endif
						href="{{ url('/escritorio/usuarios') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
				</ul>
			</li>
			<li>
				<a
					@if(Route::is('escritorio/metadatos/sursoom')) class="active" @endif
					@if(Route::is('escritorio/metadatos/gba')) class="active" @endif
					@if(Route::is('escritorio/metadatos/odoo')) class="active" @endif
				href="#"><span class="fas fa-cogs"></span> Metadatos</a>
				<ul
					@if(Route::is('escritorio/metadatos/sursoom')) class="show" @endif
					@if(Route::is('escritorio/metadatos/gba')) class="show" @endif
					@if(Route::is('escritorio/metadatos/odoo')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/metadatos/sursoom')) class="active" @endif href="{{ url('/escritorio/metadatos/sursoom') }}"><span class="fas fa-pencil-alt"></span> Sursoom</a></li>
					<li><a @if(Route::is('escritorio/metadatos/gba')) class="active" @endif href="{{ url('/escritorio/metadatos/gba') }}"><span class="fas fa-pencil-alt"></span> GBA</a></li>
					<li><a @if(Route::is('escritorio/metadatos/odoo')) class="active" @endif href="{{ url('/escritorio/metadatos/odoo') }}"><span class="fas fa-pencil-alt"></span> Odoo</a></li>
				</ul>
			</li>			
		</ul>
		<ul>
			<li><span>Sursoom</span></li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/sursoom/cabecera')) class="active" @endif
					@if(Route::is('escritorio/sursoom/nosotros')) class="active" @endif
					@if(Route::is('escritorio/sursoom/descanso')) class="active" @endif
					@if(Route::is('escritorio/sursoom/productos')) class="active" @endif
					@if(Route::is('escritorio/sursoom/documentacion')) class="active" @endif
					@if(Route::is('escritorio/sursoom/blog')) class="active" @endif
				><span class="fas fa-home"></span> Inicio</a>
				<ul
					@if(Route::is('escritorio/sursoom/cabecera')) class="show" @endif
					@if(Route::is('escritorio/sursoom/nosotros')) class="show" @endif
					@if(Route::is('escritorio/sursoom/descanso')) class="show" @endif
					@if(Route::is('escritorio/sursoom/productos')) class="show" @endif
					@if(Route::is('escritorio/sursoom/documentacion')) class="show" @endif
					@if(Route::is('escritorio/sursoom/blog')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/sursoom/cabecera')) class="active" @endif href="{{ url('/escritorio/sursoom/cabecera') }}"><span class="fas fa-pencil-alt"></span> Cabecera</a></li>
					<li><a @if(Route::is('escritorio/sursoom/nosotros')) class="active" @endif href="{{ url('/escritorio/sursoom/nosotros') }}"><span class="fas fa-pencil-alt"></span> Nosotros</a></li>
					<li><a @if(Route::is('escritorio/sursoom/descanso')) class="active" @endif href="{{ url('/escritorio/sursoom/descanso') }}"><span class="fas fa-pencil-alt"></span> Descanso</a></li>
					<li><a @if(Route::is('escritorio/sursoom/productos')) class="active" @endif href="{{ url('/escritorio/sursoom/productos') }}"><span class="fas fa-pencil-alt"></span> Productos</a></li>
					<li><a @if(Route::is('escritorio/sursoom/documentacion')) class="active" @endif href="{{ url('/escritorio/sursoom/documentacion') }}"><span class="fas fa-pencil-alt"></span> Documentación</a></li>
					<li><a @if(Route::is('escritorio/sursoom/blog')) class="active" @endif href="{{ url('/escritorio/sursoom/blog') }}"><span class="fas fa-pencil-alt"></span> Blog</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/servicios')) class="active" @endif
					@if(Route::is('escritorio/servicios/crear')) class="active" @endif
					@if(Route::is('escritorio/servicios/editar')) class="active" @endif
				><span class="fas fa-handshake"></span> Servicios</a>
				<ul
					@if(Route::is('escritorio/servicios')) class="show" @endif
					@if(Route::is('escritorio/servicios/crear')) class="show" @endif
					@if(Route::is('escritorio/servicios/editar')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/servicios')) class="active" @endif href="{{ url('/escritorio/servicios') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/servicios/crear')) class="active" @endif href="{{ url('/escritorio/servicios/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/articulos')) class="active" @endif
					@if(Route::is('escritorio/articulos/crear')) class="active" @endif
					@if(Route::is('escritorio/articulos/editar')) class="active" @endif
				><span class="far fa-newspaper"></span> Blog</a>
				<ul
					@if(Route::is('escritorio/articulos')) class="show" @endif
					@if(Route::is('escritorio/articulos/crear')) class="show" @endif
					@if(Route::is('escritorio/articulos/editar')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/articulos')) class="active" @endif @if(Route::is('escritorio/articulos/editar')) class="active" @endif href="{{ url('/escritorio/articulos') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/articulos/crear')) class="active" @endif href="{{ url('/escritorio/articulos/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
		</ul>
		<ul>
			<li><span>GBA</span></li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/gba/cabecera')) class="active" @endif
					@if(Route::is('escritorio/gba/nosotros')) class="active" @endif
					@if(Route::is('escritorio/gba/descanso')) class="active" @endif
					@if(Route::is('escritorio/gba/soluciones')) class="active" @endif
					@if(Route::is('escritorio/gba/sistemas')) class="active" @endif
				><span class="fas fa-home"></span> Inicio</a>
				<ul
					@if(Route::is('escritorio/gba/cabecera')) class="show" @endif
					@if(Route::is('escritorio/gba/nosotros')) class="show" @endif
					@if(Route::is('escritorio/gba/descanso')) class="show" @endif
					@if(Route::is('escritorio/gba/soluciones')) class="show" @endif
					@if(Route::is('escritorio/gba/sistemas')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/gba/cabecera')) class="active" @endif href="{{ url('/escritorio/gba/cabecera') }}"><span class="fas fa-pencil-alt"></span> Cabecera</a></li>
					<li><a @if(Route::is('escritorio/gba/nosotros')) class="active" @endif href="{{ url('/escritorio/gba/nosotros') }}"><span class="fas fa-pencil-alt"></span> Nosotros</a></li>
					<li><a @if(Route::is('escritorio/gba/descanso')) class="active" @endif href="{{ url('/escritorio/gba/descanso') }}"><span class="fas fa-pencil-alt"></span> Descanso</a></li>
					<li><a @if(Route::is('escritorio/gba/soluciones')) class="active" @endif href="{{ url('/escritorio/gba/soluciones') }}"><span class="fas fa-pencil-alt"></span> Soluciones</a></li>
					<li><a @if(Route::is('escritorio/gba/sistemas')) class="active" @endif href="{{ url('/escritorio/gba/sistemas') }}"><span class="fas fa-pencil-alt"></span> Sistemas</a></li>
				</ul>
			</li>
			<li>
				<a
					@if(Route::is('escritorio/gba/elementos')) class="active" @endif
					@if(Route::is('escritorio/gba/elementos/crear')) class="active" @endif
				href="#"><span class="fab fa-elementor"></span> Descanso</a>
				<ul @if(Route::is('escritorio/gba/elementos')) class="show" @endif @if(Route::is('escritorio/gba/elementos/crear')) class="show" @endif>
					<li><a @if(Route::is('escritorio/gba/elementos')) class="active" @endif @if(Route::is('escritorio/gba/elementos/editar')) class="active" @endif href="{{ url('/escritorio/gba/elementos') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/gba/elementos/crear')) class="active" @endif href="{{ url('/escritorio/gba/elementos/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a
					@if(Route::is('escritorio/gba/solutions')) class="active" @endif
					@if(Route::is('escritorio/gba/solutions/crear')) class="active" @endif
				href="#"><span class="fas fa-puzzle-piece"></span> Soluciones</a>
				<ul @if(Route::is('escritorio/gba/solutions')) class="show" @endif @if(Route::is('escritorio/gba/solutions/crear')) class="show" @endif>
					<li><a @if(Route::is('escritorio/gba/solutions')) class="active" @endif @if(Route::is('escritorio/gba/solutions/editar')) class="active" @endif href="{{ url('/escritorio/gba/solutions') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/gba/solutions/crear')) class="active" @endif href="{{ url('/escritorio/gba/solutions/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a
					@if(Route::is('escritorio/gba/documentacion')) class="active" @endif
					@if(Route::is('escritorio/gba/documentacion/crear')) class="active" @endif
				href="#"><span class="far fa-file-alt"></span> Documentación</a>
				<ul @if(Route::is('escritorio/gba/documentacion')) class="show" @endif @if(Route::is('escritorio/gba/documentacion/crear')) class="show" @endif>
					<li><a @if(Route::is('escritorio/gba/documentacion')) class="active" @endif @if(Route::is('escritorio/gba/documentacion/editar')) class="active" @endif href="{{ url('/escritorio/gba/documentacion') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/gba/documentacion/crear')) class="active" @endif href="{{ url('/escritorio/gba/documentacion/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a
					@if(Route::is('escritorio/gba/systems')) class="active" @endif
					@if(Route::is('escritorio/gba/systems/crear')) class="active" @endif
				href="#"><span class="fas fa-cog"></span> Sistemas</a>
				<ul @if(Route::is('escritorio/gba/systems')) class="show" @endif @if(Route::is('escritorio/gba/systems/crear')) class="show" @endif>
					<li><a @if(Route::is('escritorio/gba/systems')) class="active" @endif @if(Route::is('escritorio/gba/systems/editar')) class="active" @endif href="{{ url('/escritorio/gba/systems') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/gba/systems/crear')) class="active" @endif href="{{ url('/escritorio/gba/systems/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
		</ul>
		<ul>
			<li><span>Odoo</span></li>
			<li>
				<a
					@if(Route::is('escritorio/odoo/inicio/cabecera')) class="active" @endif
					@if(Route::is('escritorio/odoo/inicio/nosotros')) class="active" @endif
					@if(Route::is('escritorio/odoo/inicio/clientes')) class="active" @endif
					@if(Route::is('escritorio/odoo/inicio/aplicaciones')) class="active" @endif
					@if(Route::is('escritorio/odoo/inicio/descanso')) class="active" @endif
					@if(Route::is('escritorio/odoo/inicio/metodologia')) class="active" @endif
				href="#"><span class="fas fa-home"></span> Inicio</a>
				<ul
					@if(Route::is('escritorio/odoo/inicio/cabecera')) class="show" @endif
					@if(Route::is('escritorio/odoo/inicio/nosotros')) class="show" @endif
					@if(Route::is('escritorio/odoo/inicio/clientes')) class="show" @endif
					@if(Route::is('escritorio/odoo/inicio/aplicaciones')) class="show" @endif
					@if(Route::is('escritorio/odoo/inicio/descanso')) class="show" @endif
					@if(Route::is('escritorio/odoo/inicio/metodologia')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/odoo/inicio/cabecera')) class="active" @endif href="{{ url('/escritorio/odoo/inicio/cabecera') }}"><span class="fas fa-pencil-alt"></span> Cabecera</a></li>
					<li><a @if(Route::is('escritorio/odoo/inicio/nosotros')) class="active" @endif href="{{ url('/escritorio/odoo/inicio/nosotros') }}"><span class="fas fa-pencil-alt"></span> Nosotros</a></li>
					<li><a @if(Route::is('escritorio/odoo/inicio/clientes')) class="active" @endif href="{{ url('/escritorio/odoo/inicio/clientes') }}"><span class="fas fa-pencil-alt"></span> Clientes</a></li>
					<li><a @if(Route::is('escritorio/odoo/inicio/aplicaciones')) class="active" @endif href="{{ url('/escritorio/odoo/inicio/aplicaciones') }}"><span class="fas fa-pencil-alt"></span> Aplicaciones</a></li>
					<li><a @if(Route::is('escritorio/odoo/inicio/descanso')) class="active" @endif href="{{ url('/escritorio/odoo/inicio/descanso') }}"><span class="fas fa-pencil-alt"></span> Descanso</a></li>
					<li><a @if(Route::is('escritorio/odoo/inicio/metodologia')) class="active" @endif href="{{ url('/escritorio/odoo/inicio/metodologia') }}"><span class="fas fa-pencil-alt"></span> Metodología</a></li>
				</ul>
			</li>
			<li>
				<a
					@if(Route::is('escritorio/odoo/ecosistemas')) class="active" @endif
					@if(Route::is('escritorio/odoo/ecosistemas/crear')) class="active" @endif
				href="#"><span class="fas fa-solar-panel"></span> Ecosistema</a>
				<ul @if(Route::is('escritorio/odoo/ecosistemas')) class="show" @endif
				@if(Route::is('escritorio/odoo/ecosistemas/crear')) class="show" @endif>
					<li><a @if(Route::is('escritorio/odoo/ecosistemas')) class="active" @endif @if(Route::is('escritorio/odoo/ecosistemas/editar')) class="active" @endif href="{{ url('/escritorio/odoo/ecosistemas') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/odoo/ecosistemas/crear')) class="active" @endif href="{{ url('/escritorio/odoo/ecosistemas/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a
					@if(Route::is('escritorio/odoo/clientes')) class="active" @endif
					@if(Route::is('escritorio/odoo/clientes/crear')) class="active" @endif
				href="#"><span class="fas fa-box-open"></span> Clientes</a>
				<ul @if(Route::is('escritorio/odoo/clientes')) class="show" @endif
				@if(Route::is('escritorio/odoo/clientes/crear')) class="show" @endif>
					<li><a @if(Route::is('escritorio/odoo/clientes')) class="active" @endif @if(Route::is('escritorio/odoo/clientes/editar')) class="active" @endif href="{{ url('/escritorio/odoo/clientes') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/odoo/clientes/crear')) class="active" @endif href="{{ url('/escritorio/odoo/clientes/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a
					@if(Route::is('escritorio/odoo/aplicaciones')) class="active" @endif
					@if(Route::is('escritorio/odoo/aplicaciones/crear')) class="active" @endif
				href="#"><span class="fab fa-sketch"></span> Aplicaciones</a>
				<ul @if(Route::is('escritorio/odoo/aplicaciones')) class="show" @endif
				@if(Route::is('escritorio/odoo/aplicaciones/crear')) class="show" @endif>
					<li><a @if(Route::is('escritorio/odoo/aplicaciones')) class="active" @endif @if(Route::is('escritorio/odoo/aplicaciones/editar')) class="active" @endif href="{{ url('/escritorio/odoo/aplicaciones') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/odoo/aplicaciones/crear')) class="active" @endif href="{{ url('/escritorio/odoo/aplicaciones/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a
					@if(Route::is('escritorio/odoo/metodologia')) class="active" @endif
					@if(Route::is('escritorio/odoo/metodologia/crear')) class="active" @endif
				href="#"><span class="fas fa-retweet"></span> Metodología</a>
				<ul @if(Route::is('escritorio/odoo/metodologia')) class="show" @endif
					@if(Route::is('escritorio/odoo/metodologia/crear')) class="show" @endif>
					<li><a @if(Route::is('escritorio/odoo/metodologia')) class="active" @endif @if(Route::is('escritorio/odoo/metodologia/editar')) class="active" @endif href="{{ url('/escritorio/odoo/metodologia') }}"><span class="fas fa-list-ul"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/odoo/metodologia/crear')) class="active" @endif href="{{ url('/escritorio/odoo/metodologia/crear') }}"><span class="fas fa-pencil-alt"></span> Añadir</a></li>
				</ul>
			</li>
		</ul>
	</aside>
	{{-- Contenido --}}
	<section>
		@yield('content')
	</section>
	{{-- JavaScript --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	@yield('js')
</body>
</html>