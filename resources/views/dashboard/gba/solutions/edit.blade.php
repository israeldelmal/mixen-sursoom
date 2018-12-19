@extends('dashboard.master')

@section('title', 'Escritorio: Editar Solución')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Solución</h1>
			<form action="{{ url('/escritorio/gba/solutions/actualizar/' . $gba->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="title">Título</label>
					<input type="text" name="title" id="title" placeholder="Título de la solución" autocomplete="off" autofocus value="{{ $gba->title }}">
					@if ($errors->has('title'))
						<div>{{ $errors->first('title')}}</div>
					@endif
				</div>
				<div>
					<label for="slug"><strong>URL Actual: <i>/{{  $gba->slug }}</i></strong></label>
					<input type="text" name="slug" id="slug" placeholder="URL de la solución" autocomplete="off">
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
					<textarea name="content" id="formcontent">{{ $gba->content }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
					@endif
				</div>
				<div>
					<label for="description">Descripción (Máximo <span id="resultado"></span>155 caracteres)</label>
					<textarea name="description" id="description" maxlength="155" onKeyDown="contador()" onKeyUp="contador()">{{ $gba->description }}</textarea>
					@if ($errors->has('description'))
						<div>{{ $errors->first('description')}}</div>
					@endif
				</div>
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option value="0" @if($gba->status == false) selected @endif>Inactivo</option>
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