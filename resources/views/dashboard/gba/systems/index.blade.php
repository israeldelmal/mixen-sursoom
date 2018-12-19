@extends('dashboard.master')

@section('title', 'Escritorio: Sistemas')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Sistemas</h1>
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
						@foreach($gba as $system)
							<tr>
								<td>{{ $system->title }}</td>
								<td>{{ $system->user->name }} {{ $system->user->lastname }}</td>
								<td>
									@if($system->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $system->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/gba/systems/editar/' . $system->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
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