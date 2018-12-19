@extends('dashboard.master')

@section('title', 'Escritorio: Editar Clientes')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Clientes</h1>
			<form action="{{ url('/escritorio/odoo/inicio/clientes/actualizar') }}" method="POST">
				<div>
					<label for="clients_h1">Título</label>
					<input type="text" name="clients_h1" id="clients_h1" autofocus autocomplete="off" placeholder="Título principal" value="{{ $clients->clients_h1 }}">
					@if ($errors->has('clients_h1'))
						<div>{{ $errors->first('clients_h1')}}</div>
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