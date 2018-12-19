@extends('dashboard.master')

@section('title', 'Escritorio: Editar Cabecera')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Cabecera</h1>
			<form action="{{ url('/escritorio/gba/cabecera/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="header_h1">Título</label>
					<textarea name="header_h1" id="header_h1" placeholder="Título principal">{{ $gba->header_h1 }}</textarea>
					@if ($errors->has('header_h1'))
						<div>{{ $errors->first('header_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="header_sub">Subtítulo</label>
					<textarea name="header_sub" id="header_sub" placeholder="Subtítulo" rows="3">{{ $gba->header_sub }}</textarea>
					@if ($errors->has('header_sub'))
						<div>{{ $errors->first('header_sub')}}</div>
					@endif
				</div>
				<div>
					<label for="header_logo">Imagen de Logo</label>
					<input type="file" name="header_logo" id="header_logo">
					@if ($errors->has('header_logo'))
						<div>{{ $errors->first('header_logo')}}</div>
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
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection