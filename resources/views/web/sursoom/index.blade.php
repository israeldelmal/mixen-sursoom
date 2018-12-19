@extends('master')

@section('title', 'Sursoom')

@section('content')
	<div id="sursoom">
		{{-- Cabecera --}}
		<header id="inicio" data-parallax="scroll" data-image-src="{{ asset('assets/images/cabecera/' . $sursoom->img_1) }}">
			<div>
				<h1>{{ $sursoom->header_h1 }}</h1>
				<sub>{{ $sursoom->header_sub }}</sub>
				<ul>
					<li><a class="btn-green item-nav" href="#contacto">Contáctanos</a></li>
					<li><a class="btn-bordered item-nav" href="#productos">Servicios</a></li>
				</ul>
			</div>
			<a class="btn-curve item-nav" href="#nosotros">
				<i class="fas fa-chevron-down"></i>
				<img src="{{ asset('assets/images/sursoom/btn.png') }}">
			</a>
		</header>
		{{-- Nosotros --}}
		<section id="nosotros">
			<div>
				<div>
					<h1 class="title">{{ $sursoom->about_h1 }}</h1>
					{!! $sursoom->about_content !!}
				</div>
				<div>
					<img src="{{ asset('assets/images/sursoom/nosotros/' . $sursoom->img_2) }}" alt="Sursoom | Odoo">
				</div>
			</div>
		</section>
		{{-- Descanso #1 --}}
		<div id="descanso-1" data-parallax="scroll" data-image-src="{{ asset('assets/images/sursoom/descanso-1/' . $sursoom->img_3) }}">
			<div>
				<h3>{{ $sursoom->break_h1 }}</h3>
			</div>
			<a class="btn-curve item-nav" href="#productos">
				<i class="fas fa-chevron-down"></i>
				<img src="{{ asset('assets/images/sursoom/btn.png') }}">
			</a>
		</div>
		{{-- Productos --}}
		<section id="productos">
			<div>
				<h1 class="title">{{ $sursoom->products_h1 }}</h1>
				<sub>{{ $sursoom->products_sub }}</sub>
				<div>
					@foreach($services as $service)
						<a href="{{ url('/servicios/' . $service->slug) }}">
							<img src="{{ asset('assets/images/sursoom/servicios/' . $service->img) }}" alt="Ícono del Servicio: {{ $service->title }}">
							<strong>{{ $service->title }}</strong>
							{{ $service->description }}
						</a>
					@endforeach
				</div>
			</div>
		</section>
		{{-- Documentación --}}
		<section id="documentacion">
			<div>
				<div style="background-image: url('{{ asset('assets/images/sursoom/documentacion/' . $sursoom->img_4) }}');"></div>
				<div>
					<h1 class="title">{{ $sursoom->docs_h1 }}</h1>
					{!! $sursoom->docs_content_1 !!}
					<a href="#" class="btn-green">Contáctanos</a>
				</div>
			</div>
			<div>
				<div style="background-image: url('{{ asset('assets/images/sursoom/documentacion/' . $sursoom->img_5) }}');"></div>
				<div>
					<h2 class="title">{{ $sursoom->docs_h2 }}</h2>
					{!! $sursoom->docs_content_2 !!}
					<a href="#" class="btn-green">Contáctanos</a>
				</div>
			</div>
		</section>
		{{-- Descanso #2 --}}
		<div id="descanso-2" data-parallax="scroll" data-image-src="{{ asset('assets/images/sursoom/descanso-1/fondo.jpg') }}">
			<div>
				<h3>Conoce nuestros tipos de sistemas</h3>
				<figure>
					<img src="{{ asset('assets/images/sursoom/descanso-2/gba.png') }}" alt="Isologo GBA Tecnologías">
					<a href="{{ url('/gba') }}" class="btn-green">Ver más</a>
				</figure>
				<figure>
					<img src="{{ asset('assets/images/sursoom/descanso-2/odoo.png') }}" alt="Isologo Odoo">
					<a href="{{ url('/odoo') }}" class="btn-green">Ver más</a>
				</figure>
			</div>
			<a class="btn-curve item-nav" href="#blog">
				<i class="fas fa-chevron-down"></i>
				<img src="{{ asset('assets/images/sursoom/btn.png') }}">
			</a>
		</div>
		{{-- Blog --}}
		<main id="blog">
			<div>
				<h1 class="title">{!! $sursoom->blog_h1 !!}</h1>
				<sub>{!! $sursoom->blog_sub !!}</sub>
				<div>
					@if(count($articles) > 0)
						@foreach($articles as $article)
							<article>
								<header>
									<img src="{{ asset('assets/images/articulos/' . $article->img) }}" alt="Imagen: {{ $article->title }}">
								</header>
								<h1>{{ $article->title }}</h1>
								<div>
									<address>{{ $article->user->name }} {{ $article->user->lastname }}</address>
									<span>/</span>
									<time>{{ $article->created_at->format('d | m | Y') }}</time>
								</div>
								<p>{{ $article->description }}</p>
								<a href="{{ url('/articulos/' . $article->slug) }}" class="btn-green">Leer más</a>
							</article>
						@endforeach
					@else
					@endif
				</div>
			</div>
		</main>
	</div>
@endsection

@section('js')
	{{-- JavaScript --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/parallax.js') }}"></script>
	<script src="{{ asset('assets/js/scrolltop.js') }}"></script>
	<script src="{{ asset('assets/js/app.js') }}"></script>
@endsection