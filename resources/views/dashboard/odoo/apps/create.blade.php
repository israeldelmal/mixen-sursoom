@extends('dashboard.master')

@section('title', 'Escritorio: Crear Aplicación')

@section('content')
	<div class="forms">
		<div>
			<h1>Crear Aplicación</h1>
			<form action="{{ url('/escritorio/odoo/aplicaciones/almacenar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="title">Título</label>
					<input type="text" name="title" id="title" placeholder="Título del Aplicación" autocomplete="off" autofocus value="{{ old('title') }}">
					@if ($errors->has('title'))
						<div>{{ $errors->first('title')}}</div>
					@endif
				</div>
				<div>
					<label for="img">Imagen</label>
					<input type="file" name="img" id="img">
					@if ($errors->has('img'))
						<div>{{ $errors->first('img')}}</div>
					@endif
				</div>
				<div>
					<label for="content">Contenido</label>
					<textarea name="content" id="content">{{ old('content') }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Crear</button>
				</div>
				@csrf
			</form>
		</div>
	</div>
@endsection

@section('js')
	<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'content' );
	</script>
@endsection