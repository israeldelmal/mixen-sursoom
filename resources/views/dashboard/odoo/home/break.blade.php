@extends('dashboard.master')

@section('title', 'Escritorio: Editar Descanso')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Descanso</h1>
			<form action="{{ url('/escritorio/odoo/inicio/descanso/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="break_h1">Título</label>
					<textarea name="break_h1" id="break_h1" placeholder="Título principal">{{ $break->break_h1 }}</textarea>
					@if ($errors->has('break_h1'))
						<div>{{ $errors->first('break_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="break_img">Imagen de Fondo</label>
					<input type="file" name="break_img" id="break_img">
					@if ($errors->has('break_img'))
						<div>{{ $errors->first('break_img')}}</div>
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