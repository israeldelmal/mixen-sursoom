@extends('dashboard.master')

@section('title', 'Escritorio: Editar Productos')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Productos</h1>
			<form action="{{ url('/escritorio/sursoom/productos/actualizar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="products_h1">Título</label>
					<input type="text" name="products_h1" id="products_h1" placeholder="Título principal" autofocus autocomplete="off" value="{{ $products->products_h1 }}">
					@if ($errors->has('products_h1'))
						<div>{{ $errors->first('products_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="products_sub">Subtítulo</label>
					<textarea name="products_sub" id="products_sub" placeholder="Subtítulo" rows="3">{{ $products->products_sub }}</textarea>
					@if ($errors->has('products_sub'))
						<div>{{ $errors->first('products_sub')}}</div>
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