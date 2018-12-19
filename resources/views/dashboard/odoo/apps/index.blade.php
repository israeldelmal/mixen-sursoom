@extends('dashboard.master')

@section('title', 'Escritorio: Aplicaciones')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Aplicaciones</h1>
			<table>
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($apps) > 0)
						@foreach($apps as $app)
							<tr>
								<td>{{ $app->title }}</td>
								<td>{{ $app->user->name }} {{ $app->user->lastname }}</td>
								<td>
									@if($app->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $app->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/odoo/aplicaciones/editar/' . $app->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
		{{ $apps->links() }}
	</div>
@endsection