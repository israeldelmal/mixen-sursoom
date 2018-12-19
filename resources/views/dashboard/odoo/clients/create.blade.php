@extends('dashboard.master')

@section('title', 'Escritorio: Crear Cliente')

@section('content')
	<div class="forms">
		<div>
			<h1>Crear Cliente</h1>
			<form action="{{ url('/escritorio/odoo/clientes/almacenar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del Cliente" autocomplete="off" autofocus value="{{ old('name') }}">
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
					<button type="submit">Crear</button>
				</div>
				@csrf
			</form>
		</div>
	</div>
@endsection