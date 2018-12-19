@extends('dashboard.master')

@section('title', 'Escritorio: Editar Cabecera')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Cabecera</h1>
			<form action="{{ url('/escritorio/sursoom/cabecera/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="header_h1">Título</label>
					<textarea name="header_h1" id="header_h1" placeholder="Título principal">{{ $header->header_h1 }}</textarea>
					@if ($errors->has('header_h1'))
						<div>{{ $errors->first('header_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="header_sub">Subtítulo</label>
					<textarea name="header_sub" id="header_sub" placeholder="Subtítulo" rows="3">{{ $header->header_sub }}</textarea>
					@if ($errors->has('header_sub'))
						<div>{{ $errors->first('header_sub')}}</div>
					@endif
				</div>
				<div>
					<label for="img_1">Imagen</label>
					<input type="file" name="img_1" id="img_1">
					@if ($errors->has('img_1'))
						<div>{{ $errors->first('img_1')}}</div>
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