@extends('dashboard.master')

@section('title', 'Escritorio: Ecosistemas')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Ecosistemas</h1>
			<table>
				<thead>
					<tr>
						<td>Título</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($ecos) > 0)
						@foreach($ecos as $eco)
							<tr>
								<td>{{ $eco->title }}</td>
								<td>{{ $eco->user->name }} {{ $eco->user->lastname }}</td>
								<td>
									@if($eco->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $eco->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/odoo/ecosistemas/editar/' . $eco->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
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
		{{ $ecos->links() }}
	</div>
@endsection