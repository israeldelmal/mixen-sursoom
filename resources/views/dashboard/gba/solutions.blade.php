@extends('dashboard.master')

@section('title', 'Escritorio: Actualizar soluciones')

@section('content')
	<div class="forms">
		<div>
			<h1>Actualizar soluciones</h1>
			<form action="{{ url('/escritorio/gba/soluciones/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="solutions_h1">Título</label>
					<input type="text" name="solutions_h1" id="solutions_h1" placeholder="Título" autocomplete="off" autofocus value="{{ $gba->solutions_h1 }}">
					@if ($errors->has('solutions_h1'))
						<div>{{ $errors->first('solutions_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="solutions_sub">Subtítulo</label>
					<input type="text" name="solutions_sub" id="solutions_sub" placeholder="Título" autocomplete="off" autofocus value="{{ $gba->solutions_sub }}">
					@if ($errors->has('solutions_sub'))
						<div>{{ $errors->first('solutions_sub')}}</div>
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

@section('js')
	<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'about_content' );
	</script>
@endsection