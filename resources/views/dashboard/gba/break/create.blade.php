@extends('dashboard.master')

@section('title', 'Escritorio: Crear elemento')

@section('content')
	<div class="forms">
		<div>
			<h1>Crear elemento</h1>
			<form action="{{ url('/escritorio/gba/elementos/almacenar') }}" method="POST">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del elemento" autocomplete="off" autofocus value="{{ old('name') }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Crear</button>
				</div>
				@csrf
			</form>
		</div>
	</div>
@endsection