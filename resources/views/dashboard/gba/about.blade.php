@extends('dashboard.master')

@section('title', 'Escritorio: Actualizar nosotros')

@section('content')
	<div class="forms">
		<div>
			<h1>Actualizar nosotros</h1>
			<form action="{{ url('/escritorio/gba/nosotros/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="about_h1">Título</label>
					<input type="text" name="about_h1" id="about_h1" placeholder="Título" autocomplete="off" autofocus value="{{ $gba->about_h1 }}">
					@if ($errors->has('about_h1'))
						<div>{{ $errors->first('about_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="about_content">Contenido</label>
					<textarea name="about_content" id="about_content">{{ $gba->about_content }}</textarea>
					@if ($errors->has('about_content'))
						<div>{{ $errors->first('about_content')}}</div>
					@endif
				</div>
				<div>
					<label for="about_img">Imagen</label>
					<input type="file" name="about_img" id="about_img">
					@if ($errors->has('about_img'))
						<div>{{ $errors->first('about_img')}}</div>
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

@section('js')
	<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'about_content' );
	</script>
@endsection