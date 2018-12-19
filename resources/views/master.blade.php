<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('meta')
	<meta name="author" content="Mixen: Boosting Brands">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/icons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
	{{-- Navegación --}}
	@if(Route::is('odoo'))
		<nav class="nav-odoo">
	@else
		<nav>
	@endif
		<div>
			<a class="item-nav" href="#inicio"><img src="{{ asset('assets/images/logo.png') }}" alt="Isologo de Sursoom"></a>
			<ul>
				<li><a class="item-nav" href="#nosotros">Nosotros</a></li>
				<li><a class="item-nav" href="#productos">Servicios</a></li>
				<li><a class="item-nav" href="#documentacion">Documentación</a></li>
				<li><a class="item-nav" href="#blog">Blog</a></li>
				<li><a class="item-nav" href="#contacto">Contacto</a></li>
			</ul>
		</div>
	</nav>
	@yield('content')
	{{-- Contacto --}}
	<section id="contacto" style="background-image: url('{{ asset('assets/images/contacto/fondo.jpg') }}');">
		<div>
			<h2>Contáctanos</h2>
			<sub>Nosotros te ayudamos</sub>
			<form action="#" method="POST" id="FormContacto">
				<div>
					<input type="text" name="name" id="name" placeholder="Nombre" autocomplete="off">
					<div id="error_name"></div>
				</div>
				<div>
					<input type="tel" name="tel" id="tel" placeholder="Teléfono: 000 - 0000000" autocomplete="off">
					<div id="error_tel"></div>
				</div>
				<div>
					<input type="email" name="email" id="email" placeholder="Correo Electrónico: ejemplo@ejemplo.com" autocomplete="off">
					<div id="error_email"></div>
				</div>
				<div>
					<input type="text" name="company" id="company" placeholder="Empresa" autocomplete="off">
					<div id="error_company"></div>
				</div>
				<div>
					<textarea name="message" id="message" rows="5" placeholder="Mensaje"></textarea>
					<div id="error_message"></div>
				</div>
				<div>
					<button class="btn-green" type="submit">Enviar</button>
				</div>
			</form>
		</div>
		<map name="Mapa de Sursoom"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.4939294226965!2d-106.0822347845042!3d28.67486788891364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea4395467e3fbd%3A0xc1d86b2908748e9f!2sGBA+Tecnolog%C3%ADas!5e0!3m2!1ses-419!2smx!4v1543447343381" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></map>
	</section>
	{{-- Pie --}}
	<footer>
		<div>
			<div>
				<ul>
					<li>Parque de Innovación
					y Transferencia de Tecnología (PIT2)
					Chihuahua, Chih. CP: 31150</li>
					<li><a href="tel:6144841167">Tel. +52 (614) 484 1167</a></li>
					<li><a href="tel:6142151114">Móvil / Whatsapp +52 (614) 215 1114</a></li>
					<li><a href="mailto:info@sursoom.mx">info@sursoom.mx</a></li>
				</ul>
			</div>
			<div>
				<img src="{{ asset('assets/images/logo-blanco.png') }}" alt="Isologo de Sursoom">
			</div>
			<div>
				<a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
			</div>
		</div>
		<div>
			Todos los derechos reservados | <strong>Made by:</strong> <a href="https://mixen.mx" target="_blank"><span class="icon-mixen"></span></a>
		</div>
	</footer>
	{{-- Botón --}}
	<button>
		<span></span>
		<span></span>
		<span></span>
	</button>
	@yield('js')
</body>
</html>