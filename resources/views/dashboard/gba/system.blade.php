@extends('dashboard.master')

@section('title', 'Escritorio: Actualizar sistemas')

@section('content')
	<div class="forms">
		<div>
			<h1>Actualizar sistemas</h1>
			<form action="{{ url('/escritorio/gba/sistemas/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="sistems_h1">Título</label>
					<input type="text" name="sistems_h1" id="sistems_h1" placeholder="Título" autocomplete="off" autofocus value="{{ $gba->sistems_h1 }}">
					@if ($errors->has('sistems_h1'))
						<div>{{ $errors->first('sistems_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="sistems_img">Imagen</label>
					<input type="file" name="sistems_img" id="sistems_img">
					@if ($errors->has('break_img'))
						<div>{{ $errors->first('break_img')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Actualizar</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection