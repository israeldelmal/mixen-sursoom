@extends('dashboard.master')

@section('title', 'Escritorio: Editar Cliente')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Cliente</h1>
			<form action="{{ url('/escritorio/odoo/clientes/actualizar/' . $client->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del Cliente" autocomplete="off" autofocus value="{{ $client->name }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<label for="img">Imagen</label>
					<input type="file" name="img" id="img">
					@if ($errors->has('img'))
						<div>{{ $errors->first('img')}}</div>
					@endif
				</div>
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option value="0" @if($client->status == false) selected @endif>Inactivo</option>
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