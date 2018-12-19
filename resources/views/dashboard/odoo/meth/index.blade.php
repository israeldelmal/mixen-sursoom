@extends('dashboard.master')

@section('title', 'Escritorio: Metodología')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Metodología</h1>
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
					@if(count($meths) > 0)
						@foreach($meths as $meth)
							<tr>
								<td>{{ $meth->title }}</td>
								<td>{{ $meth->user->name }} {{ $meth->user->lastname }}</td>
								<td>
									@if($meth->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $meth->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/odoo/metodologia/editar/' . $meth->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
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
		{{ $meths->links() }}
	</div>
@endsection