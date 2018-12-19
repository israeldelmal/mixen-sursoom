@extends('dashboard.master')

@section('title', 'Escritorio: Crear Solución')

@section('content')
	<div class="forms">
		<div>
			<h1>Crear Solución</h1>
			<form action="{{ url('/escritorio/gba/solutions/almacenar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="title">Título</label>
					<input type="text" name="title" id="title" placeholder="Título de la solución" autocomplete="off" autofocus value="{{ old('title') }}">
					@if ($errors->has('title'))
						<div>{{ $errors->first('title')}}</div>
					@endif
				</div>
				<div>
					<label for="slug">URL</label>
					<input type="text" name="slug" id="slug" placeholder="URL de la solución" autocomplete="off" value="{{ old('slug') }}">
					@if ($errors->has('slug'))
						<div>{{ $errors->first('slug')}}</div>
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
					<textarea name="content" id="formcontent">{{ old('content') }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
					@endif
				</div>
				<div>
					<label for="description">Descripción (Máximo <span id="resultado"></span>155 caracteres)</label>
					<textarea name="description" id="description" maxlength="155" onKeyDown="contador()" onKeyUp="contador()">{{ old('description') }}</textarea>
					@if ($errors->has('description'))
						<div>{{ $errors->first('description')}}</div>
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
	<script src="{{ asset('assets/js/slug.js') }}"></script>
	<script>
		CKEDITOR.replace( 'formcontent' );

		function contador() {
			let str = $('#description').val().length + '/';
			$('#resultado').html(str);
		}

		$().ready(function () {
			$('#slug').slugify('#title');
		
			var pigLatin = function(str) {
				return str.replace(/(\w*)([aeiou]\w*)/g, "$2$1ay");
			}
		
			$('#pig_latin').slugify('#title', {
					slugFunc: function(str, originalFunc) { return pigLatin(originalFunc(str)); } 
				}
			);
		
		}); 
	</script>
@endsection