@extends('master')

@section('meta')
	<meta name="description" content="{{ $meta->odoo_description }}">
	<meta name="keywords" content="{{ $meta->odoo_keywords }}">
@endsection

@section('title', $meta->odoo_title)

@section('content')
	<div id="odoo">
		{{-- Cabecera --}}
		<header>
			<img src="{{ asset('assets/images/odoo/' . $odoo->header_img) }}" alt="Isotipo Odoo">
			<h1>{{ $odoo->header_h1 }}</h1>
			<a class="btn-curve" href="#">
				<i class="fas fa-chevron-down"></i>
				<img src="{{ asset('assets/images/sursoom/btn.png') }}">
			</a>
		</header>
		{{-- Nosotros --}}
		<section id="nosotros">
			<div>
				<div>
					<h1 class="odoo-title">{{ $odoo->about_h1 }}</h1>
					{!! $odoo->about_content !!}
				</div>
				<div>
					<img src="{{ asset('assets/images/sursoom/nosotros/' . $odoo->about_img) }}" alt="Sursoom | Odoo">
				</div>
			</div>
		</section>
		{{-- Descanso #1 --}}
		<section id="ecosistema">
			<h1>Ecosistema Odoo</h1>
			@foreach($ecos as $eco)
				<div>
					<span>{{ $eco->title }}</span>
					{!! $eco->content !!}
				</div>
			@endforeach
		</section>
		{{-- Clientes --}}
		<div id="clientes">
			<div>
				<h3 class="odoo-title">{{ $odoo->clients_h1 }}</h3>
				<ul>
					@foreach($clients as $client)
						<li><img src="{{ asset('assets/images/odoo/clientes/' . $client->img) }}" alt="Logotipo de {{ $client->name }}"></li>
					@endforeach
				</ul>
			</div>
		</div>
		{{-- Aplicaciones Principales --}}
		<section id="aplicaciones-principales">
			<div>
				<h2 class="odoo-title">{{ $odoo->apps_h1 }}</h2>
				<div>
					<div>
						<ul>
							<li><a href="#">Aplicaciones
							Sitios Web</a></li>
							<li><a href="#">Aplicaciones
							Ventas</a></li>
							<li><a href="#">Aplicaciones
							Financieras</a></li>
							<li><a href="#">Apps de
							Operaciones</a></li>
						</ul>
					</div>
					<div>
						<ul>
							<li class="padding-li">Creador de
							sitios web</li>
							<li class="padding-li">Comercio
							electrónico</li>
							<li class="padding-li">Blogs</li>
							<li class="padding-li">Foro</li>
							<li class="padding-li">Diapositivas</li>
							<li class="padding-li">Chat en directo</li>
							<li class="padding-li">Citas</li>
						</ul>
					</div>
					<div>
						<ul>
							<li><a href="#">Aplicaciones
							Fabricación</a></li>
							<li><a href="#">Aplicaciones
							Recursos H.</a></li>
							<li><a href="#">Apps de
							Comunicación</a></li>
							<li><a href="#">Aplicación
							Marketing</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		{{-- Descanso #2 --}}
		<div id="descanso-2" data-parallax="scroll" data-image-src="{{ asset('assets/images/odoo/descanso-2/' . $odoo->break_img) }}">
			<h3>{{ $odoo->break_h1 }}</h3>
			<a class="btn-curve" href="#">
				<i class="fas fa-chevron-down"></i>
				<img src="{{ asset('assets/images/sursoom/btn.png') }}">
			</a>
		</div>
		{{-- Metodología --}}
		<section id="metodologia">
			<div>
				<h1 class="odoo-title">{{ $odoo->meth_h1 }}</h1>
				<div>
					@foreach($meths as $meth)
						<a href="{{ url('/odoo/metodologia/' . $meth->slug) }}">
							<img src="{{ asset('assets/images/odoo/metodologia/' . $meth->img) }}" alt="Icono de {{ $meth->title }}">
							<strong>{{ $meth->title }}</strong>
						</a>
					@endforeach
				</div>
			</div>
		</section>
	</div>
@endsection

@section('js')
	{{-- JavaScript --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/parallax.js') }}"></script>
	<script src="{{ asset('assets/js/app.js') }}"></script>
@endsection