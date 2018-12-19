@extends('dashboard.master')

@section('title', 'Escritorio: Editar Aplicaciones')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Aplicaciones</h1>
			<form action="{{ url('/escritorio/odoo/inicio/aplicaciones/actualizar') }}" method="POST">
				<div>
					<label for="apps_h1">Título</label>
					<input type="text" name="apps_h1" id="apps_h1" autofocus autocomplete="off" placeholder="Título principal" value="{{ $apps->apps_h1 }}">
					@if ($errors->has('apps_h1'))
						<div>{{ $errors->first('apps_h1')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Actualizar</button>
				</div>
				@csrf
			</form>
		</div>
	</div>
@endsection