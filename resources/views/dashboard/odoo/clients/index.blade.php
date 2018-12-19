@extends('dashboard.master')

@section('title', 'Escritorio: Clientes')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Clientes</h1>
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
					@if(count($clients) > 0)
						@foreach($clients as $client)
							<tr>
								<td>{{ $client->name }}</td>
								<td>{{ $client->user->name }} {{ $client->user->lastname }}</td>
								<td>
									@if($client->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $client->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/odoo/clientes/editar/' . $client->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
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
		{{ $clients->links() }}
	</div>
@endsection