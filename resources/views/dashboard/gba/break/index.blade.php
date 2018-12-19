@extends('dashboard.master')

@section('title', 'Escritorio: Elementos')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Elementos</h1>
			<table>
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Decha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($gba) > 0)
						@foreach($gba as $element)
							<tr>
								<td>{{ $element->name }}</td>
								<td>{{ $element->user->name }} {{ $element->user->lastname }}</td>
								<td>
									@if($element->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $element->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/gba/elementos/editar/' . $element->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
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