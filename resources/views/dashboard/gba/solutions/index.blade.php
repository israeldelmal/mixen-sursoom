@extends('dashboard.master')

@section('title', 'Escritorio: Soluciones')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Soluciones</h1>
			<table>
				<thead>
					<tr>
						<td>Título</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Decha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($gba) > 0)
						@foreach($gba as $solution)
							<tr>
								<td>{{ $solution->title }}</td>
								<td>{{ $solution->user->name }} {{ $solution->user->lastname }}</td>
								<td>
									@if($solution->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $solution->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/gba/solutions/editar/' . $solution->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
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
		{{ $gba->links() }}
	</div>
@endsection