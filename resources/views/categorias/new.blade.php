@extends('layout')

@section('title')
	Categoría | Registro
@stop()

@section('content')
	<h1 class="text-center">Formulario de Registro</h1>
	<form action="{{ url('categorias') }}" method="POST">
		@csrf
			<div class="row">
				<div class="col-md-4">
					<input type="text" name="nombreCategoria" placeholder="Ingrese el nombre" class="form-control mb-3" value="{{ old('nombreCategoria') }}">
				</div>
				@error('nombreCategoria')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror()
			</div>
			<div class="row">
				<div class="col-md-4">
					<button class="btn btn-success">Enviar</button>
					<a href="{{ url('categorias') }}" class="btn btn-danger">Cancelar</a>
				</div>
			</div>
	</form>
@stop()