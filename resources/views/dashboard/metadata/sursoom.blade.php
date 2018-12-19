@extends('dashboard.master')

@section('title', 'Escritorio: Metadata de Sursoom')

@section('content')
	<div class="forms">
		<div>
			<h1>Metadata de Sursoom</h1>
			<form action="{{ url('/escritorio/metadatos/sursoom/actualizar') }}" method="POST">
				<div>
					<label for="ss_title">Título</label>
					<input type="text" name="ss_title" id="ss_title" placeholder="Título" autocomplete="off" autofocus value="{{ $sursoom->ss_title }}">
					@if ($errors->has('ss_title'))
						<div>{{ $errors->first('ss_title')}}</div>
					@endif
				</div>
				<div>
					<label for="ss_description">Descripción (Máximo 155 caracteres)</label>
					<textarea name="ss_description" id="ss_description" placeholder="Descripción (Máximo 155 caracteres)">{{ $sursoom->ss_description }}</textarea>
					@if ($errors->has('ss_description'))
						<div>{{ $errors->first('ss_description')}}</div>
					@endif
				</div>
				<div>
					<label for="ss_keywords">Palabras clave (Máximo 3 palabras)</label>
					<input type="text" name="ss_keywords" id="ss_keywords" placeholder="Palabra #1, Palabra #2, Palabra #3" autocomplete="off" value="{{ $sursoom->ss_keywords }}">
					@if ($errors->has('ss_keywords'))
						<div>{{ $errors->first('ss_keywords')}}</div>
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