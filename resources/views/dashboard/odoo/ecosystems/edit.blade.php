@extends('dashboard.master')

@section('title', 'Escritorio: Editar ecosistema')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar ecosistema</h1>
			<form action="{{ url('/escritorio/odoo/ecosistemas/actualizar/' . $eco->id) }}" method="POST">
				<div>
					<label for="title">Título</label>
					<input type="text" name="title" id="title" placeholder="Título del ecosistema" autocomplete="off" value="{{ $eco->title }}">
					@if ($errors->has('title'))
						<div>{{ $errors->first('title')}}</div>
					@endif
				</div>
				<div>
					<label for="content">Contenido</label>
					<textarea name="content" id="formcontent">{{ $eco->content }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
					@endif
				</div>
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option value="0" @if($eco->status == false) selected @endif>Inactivo</option>
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
	<script>
		CKEDITOR.replace( 'formcontent' );
	</script>
@endsection