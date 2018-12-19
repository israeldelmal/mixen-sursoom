@extends('dashboard.master')

@section('title', 'Escritorio: Editar Metodología')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Metodología</h1>
			<form action="{{ url('/escritorio/odoo/inicio/metodologia/actualizar') }}" method="POST">
				<div>
					<label for="meth_h1">Título</label>
					<input type="text" name="meth_h1" id="meth_h1" autofocus autocomplete="off" placeholder="Título principal" value="{{ $meth->meth_h1 }}">
					@if ($errors->has('meth_h1'))
						<div>{{ $errors->first('meth_h1')}}</div>
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