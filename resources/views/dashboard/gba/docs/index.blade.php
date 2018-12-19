@extends('dashboard.master')

@section('title', 'Escritorio: Documentos')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Documentos</h1>
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
						@foreach($gba as $doc)
							<tr>
								<td>{{ $doc->title }}</td>
								<td>{{ $doc->user->name }} {{ $doc->user->lastname }}</td>
								<td>
									@if($doc->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $doc->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/gba/documentacion/editar/' . $doc->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
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