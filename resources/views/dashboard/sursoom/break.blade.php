@extends('dashboard.master')

@section('title', 'Escritorio: Actualizar descanso')

@section('content')
	<div class="forms">
		<div>
			<h1>Actualizar descanso</h1>
			<form action="{{ url('/escritorio/sursoom/descanso/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="break_h1">Título</label>
					<textarea name="break_h1" id="break_h1" placeholder="Título" rows="2">{{ $break->break_h1 }}</textarea>
					@if ($errors->has('break_h1'))
						<div>{{ $errors->first('break_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="img_3">Imagen</label>
					<input type="file" name="img_3" id="img_3">
					@if ($errors->has('img_3'))
						<div>{{ $errors->first('img_3')}}</div>
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