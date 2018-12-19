@extends('dashboard.master')

@section('title', 'Escritorio: Editar Blog')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Blog</h1>
			<form action="{{ url('/escritorio/sursoom/blog/actualizar') }}" method="POST">
				<div>
					<label for="blog_h1">Título</label>
					<input type="text" name="blog_h1" id="blog_h1" placeholder="Título principal" autofocus autocomplete="off" value="{{ $blog->blog_h1 }}">
					@if ($errors->has('blog_h1'))
						<div>{{ $errors->first('blog_h1')}}</div>
					@endif
				</div>
				<div>
					<label for="blog_sub">Subtítulo</label>
					<textarea name="blog_sub" id="blog_sub" placeholder="Subtítulo" rows="3">{{ $blog->blog_sub }}</textarea>
					@if ($errors->has('blog_sub'))
						<div>{{ $errors->first('blog_sub')}}</div>
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