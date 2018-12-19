@extends('dashboard.master')

@section('title', 'Escritorio: Actualizar descanso')

@section('content')
	<div class="forms">
		<div>
			<h1>Actualizar descanso</h1>
			<form action="{{ url('/escritorio/gba/descanso/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="break_h1">Título</label>
					<input type="text" name="break_h1" id="break_h1" placeholder="Título" autocomplete="off" autofocus value="{{ $gba->break_h1 }}">
					@if ($errors->has('break_h1'))
						<div>{{ $errors->first('break_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="break_img">Imagen</label>
					<input type="file" name="break_img" id="break_img">
					@if ($errors->has('break_img'))
						<div>{{ $errors->first('break_img')}}</div>
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