@extends('dashboard.master')

@section('title', 'Escritorio: Editar elemento')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar elemento</h1>
			<form action="{{ url('/escritorio/gba/elementos/actualizar/' . $gba->id) }}" method="POST">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del elemento" autocomplete="off" autofocus value="{{ $gba->name }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
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