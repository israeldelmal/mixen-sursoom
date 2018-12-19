@extends('dashboard.master')

@section('title', 'Escritorio: Metadata de Odoo')

@section('content')
	<div class="forms">
		<div>
			<h1>Metadata de Odoo</h1>
			<form action="{{ url('/escritorio/metadatos/odoo/actualizar') }}" method="POST">
				<div>
					<label for="odoo_title">Título</label>
					<input type="text" name="odoo_title" id="odoo_title" placeholder="Título" autocomplete="off" autofocus value="{{ $odoo->odoo_title }}">
					@if ($errors->has('odoo_title'))
						<div>{{ $errors->first('odoo_title')}}</div>
					@endif
				</div>
				<div>
					<label for="odoo_description">Descripción (Máximo 155 caracteres)</label>
					<textarea name="odoo_description" id="odoo_description" placeholder="Descripción (Máximo 155 caracteres)">{{ $odoo->odoo_description }}</textarea>
					@if ($errors->has('odoo_description'))
						<div>{{ $errors->first('odoo_description')}}</div>
					@endif
				</div>
				<div>
					<label for="odoo_keywords">Palabras clave (Máximo 3 palabras)</label>
					<input type="text" name="odoo_keywords" id="odoo_keywords" placeholder="Palabra #1, Palabra #2, Palabra #3" autocomplete="off" value="{{ $odoo->odoo_keywords }}">
					@if ($errors->has('odoo_keywords'))
						<div>{{ $errors->first('odoo_keywords')}}</div>
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