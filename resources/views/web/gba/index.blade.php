@extends('master')

@section('meta')
	<meta name="description" content="{{ $meta->gba_description }}">
	<meta name="keywords" content="{{ $meta->gba_keywords }}">
@endsection

@section('title', $meta->gba_title)

@section('content')
	<div id="gba">
		{{-- Cabecera --}}
		<header data-parallax="scroll" data-image-src="{{ asset('assets/images/gba/cabecera/' . $gba->header_img) }}">
			<div>
				<div>
					<h1>{{ $gba->header_h1 }}</h1>
					<sub>{{ $gba->header_sub }}</sub>
					<ul>
						<li><a class="btn-green" href="#contacto">Contáctanos</a></li>
						<li><a class="btn-bordered" href="#">Servicios</a></li>
					</ul>
				</div>
				<div>
					<img src="{{ asset('assets/images/gba/cabecera/' . $gba->header_logo) }}" alt="Isologo de GBA Tecnologías">
				</div>
			</div>
			<a class="btn-curve" href="#">
				<i class="fas fa-chevron-down"></i>
				<img src="{{ asset('assets/images/sursoom/btn.png') }}">
			</a>
		</header>
		{{-- Nosotros --}}
		<section id="nosotros">
			<div>
				<div>
					<h1 class="title">{{ $gba->about_h1 }}</h1>
					{!! $gba->about_content !!}
				</div>
				<div>
					<img src="{{ asset('assets/images/sursoom/nosotros/' . $gba->about_img) }}" alt="Sursoom | Odoo">
				</div>
			</div>
		</section>
		{{-- Descanso #1 --}}
		<div id="descanso-1" data-parallax="scroll" data-image-src="{{ asset('assets/images/gba/descanso-1/' . $gba->break_img) }}">
			<div>
				<h3>{{ $gba->break_h1 }}</h3>
				<ul>
					@foreach($gbabreak as $element)
						<li>{{ $element->name }}</li>
					@endforeach
				</ul>
			</div>
			<a class="btn-curve" href="#">
				<i class="fas fa-chevron-down"></i>
				<img src="{{ asset('assets/images/sursoom/btn.png') }}">
			</a>
		</div>
		{{-- Productos --}}
		<section id="soluciones">
			<div>
				<h1 class="title">{{ $gba->solutions_h1 }}</h1>
				<sub>{{ $gba->solutions_sub }}</sub>
				<div>
					@foreach($solutions as $solution)
						<a href="{{ url('/gba/soluciones/' . $solution->slug) }}">
							<img src="{{ asset('assets/images/gba/soluciones/' . $solution->img) }}" alt="Imagen: {{ $solution->title }}">
							<strong>{{ $solution->title }}</strong>
							{{ $solution->description }}
						</a>
					@endforeach
				</div>
			</div>
		</section>
		{{-- Documentación --}}
		<section id="documentacion">
			@foreach($docs as $doc)
				<div>
					<div style="background-image: url('{{ asset('assets/images/gba/docs/' . $doc->img) }}');"></div>
					<div>
						<h1 class="title">{{ $doc->title }}</h1>
						{!! $doc->content !!}
					</div>
				</div>
			@endforeach
		</section>
		{{-- Descanso #2 --}}
		<div id="descanso-2" data-parallax="scroll" data-image-src="{{ asset('assets/images/gba/descanso-2/' . $gba->sistems_img) }}">
			<div>
				<h3>{{ $gba->sistems_h1 }}</h3>
				<ul>
					<li><img src="{{ asset('assets/images/gba/descanso-2/1.png') }}"></li>
					<li><img src="{{ asset('assets/images/gba/descanso-2/2.png') }}"></li>
					<li><img src="{{ asset('assets/images/gba/descanso-2/3.png') }}"></li>
					<li><img src="{{ asset('assets/images/gba/descanso-2/4.png') }}"></li>
					<li><img src="{{ asset('assets/images/gba/descanso-2/5.png') }}"></li>
					<li><img src="{{ asset('assets/images/gba/descanso-2/6.png') }}"></li>
				</ul>
			</div>
		</div>
@endsection

@section('js')
	{{-- JavaScript --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/parallax.js') }}"></script>
	<script src="{{ asset('assets/js/app.js') }}"></script>
@endsection