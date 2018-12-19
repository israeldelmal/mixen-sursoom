@extends('dashboard.master')

@section('title', 'Escritorio: Metadata de GBA')

@section('content')
	<div class="forms">
		<div>
			<h1>Metadata de GBA</h1>
			<form action="{{ url('/escritorio/metadatos/gba/actualizar') }}" method="POST">
				<div>
					<label for="gba_title">Título</label>
					<input type="text" name="gba_title" id="gba_title" placeholder="Título" autocomplete="off" autofocus value="{{ $gba->gba_title }}">
					@if ($errors->has('gba_title'))
						<div>{{ $errors->first('gba_title')}}</div>
					@endif
				</div>
				<div>
					<label for="gba_description">Descripción (Máximo 155 caracteres)</label>
					<textarea name="gba_description" id="gba_description" placeholder="Descripción (Máximo 155 caracteres)">{{ $gba->gba_description }}</textarea>
					@if ($errors->has('gba_description'))
						<div>{{ $errors->first('gba_description')}}</div>
					@endif
				</div>
				<div>
					<label for="gba_keywords">Palabras clave (Máximo 3 palabras)</label>
					<input type="text" name="gba_keywords" id="gba_keywords" placeholder="Palabra #1, Palabra #2, Palabra #3" autocomplete="off" value="{{ $gba->gba_keywords }}">
					@if ($errors->has('gba_keywords'))
						<div>{{ $errors->first('gba_keywords')}}</div>
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