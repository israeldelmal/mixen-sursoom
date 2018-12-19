@extends('dashboard.master')

@section('title', 'Escritorio: Editar Cabecera')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Cabecera</h1>
			<form action="{{ url('/escritorio/odoo/inicio/cabecera/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="header_h1">Título</label>
					<textarea name="header_h1" id="header_h1" placeholder="Título principal">{{ $header->header_h1 }}</textarea>
					@if ($errors->has('header_h1'))
						<div>{{ $errors->first('header_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="header_img">Imagen de Fondo</label>
					<input type="file" name="header_img" id="header_img">
					@if ($errors->has('header_img'))
						<div>{{ $errors->first('header_img')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Actualizar</button>
				</div>
				@csrf
			</form>
		</div>
	</div>
@endsection