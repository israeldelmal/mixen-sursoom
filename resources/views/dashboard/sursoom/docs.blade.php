@extends('dashboard.master')

@section('title', 'Escritorio: Editar Documentación')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Documentación</h1>
			<form action="{{ url('/escritorio/sursoom/documentacion/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="docs_h2">Título #1</label>
					<input type="text" name="docs_h1" id="docs_h1" placeholder="Título" autocomplete="off" autofocus value="{{ $docs->docs_h1 }}">
					@if ($errors->has('docs_h1'))
						<div>{{ $errors->first('docs_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="docs_content_1">Contenido #1</label>
					<textarea name="docs_content_1" id="formcontent_1">{{ $docs->docs_content_1 }}</textarea>
					@if ($errors->has('docs_content_1'))
						<div>{{ $errors->first('docs_content_1')}}</div>
					@endif
				</div>
				<div>
					<label for="img_4">Imagen #1</label>
					<input type="file" name="img_4" id="img_4">
					@if ($errors->has('img_4'))
						<div>{{ $errors->first('img_4')}}</div>
					@endif
				</div>
				<div>
					<label for="docs_h2">Título #2</label>
					<input type="text" name="docs_h2" id="docs_h2" placeholder="Título" autocomplete="off" autofocus value="{{ $docs->docs_h2 }}">
					@if ($errors->has('docs_h2'))
						<div>{{ $errors->first('docs_h2')}}</div>
					@endif
				</div>
				<div>
					<label for="docs_content_2">Contenido #2</label>
					<textarea name="docs_content_2" id="formcontent_2">{{ $docs->docs_content_2 }}</textarea>
					@if ($errors->has('docs_content_2'))
						<div>{{ $errors->first('docs_content_2')}}</div>
					@endif
				</div>
				<div>
					<label for="img_5">Imagen #2</label>
					<input type="file" name="img_5" id="img_5">
					@if ($errors->has('img_5'))
						<div>{{ $errors->first('img_5')}}</div>
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
		CKEDITOR.replace( 'formcontent_1' );
		CKEDITOR.replace( 'formcontent_2' );
	</script>
@endsection