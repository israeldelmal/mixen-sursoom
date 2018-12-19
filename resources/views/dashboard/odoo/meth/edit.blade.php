@extends('dashboard.master')

@section('title', 'Escritorio: Editar Metodología')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Metodología</h1>
			<form action="{{ url('/escritorio/odoo/metodologia/actualizar/' . $meth->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="title">Título</label>
					<input type="text" name="title" id="title" placeholder="Título del Metodología" autocomplete="off" autofocus value="{{ $meth->title }}">
					@if ($errors->has('title'))
						<div>{{ $errors->first('title')}}</div>
					@endif
				</div>
				<div>
					<label for="slug"><strong>URL Actual: <i>/{{  $meth->slug }}</i></strong></label>
					<input type="text" name="slug" id="slug" placeholder="URL de la metodología" autocomplete="off">
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
					<textarea name="content" id="content">{{ $meth->content }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
					@endif
				</div>
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option value="0" @if($meth->status == false) selected @endif>Inactivo</option>
					</select>
				</div>
				<div>
					<button type="submit">Actualizar</button>
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
		CKEDITOR.replace( 'content' );

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