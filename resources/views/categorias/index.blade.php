@extends('layout')

@section('title')
	Categoría | Listado
@stop()

@section('content')
	<h1 class="text-center">Categorías</h1>
	<a href="{{ route('categorias.create') }}" class="btn btn-success">Nuevo</a>
	@if (session('type'))
		<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
		  <strong>Mensaje</strong> {{ session('msn') }}
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		
	@endif()
	<table class="table">
		<thead>
			<th>
				Nombre Categoria
			</th>
		</thead>
		@foreach($datos as $categoria)
			<tr>
				<td>
					{{ $categoria->nombreCategoria }}
				</td>
				<td>
					<a href="{{route('categorias.edit',$categoria->id)}}"><img src="{{url('img/editar.png')}}" width="30"></a>
				</td>
				<td>
				<a href="javascript:document.getElementById('delete-{{$categoria->id }}').submit()" onclick="return confirm('Realmente quiere eliminar el registro?')">
				<img src="{{url('img/eliminar.png')}}" height="30" >
				</a>
				<form id ="delete-{{$categoria->id}}" action="{{route('categorias.destroy',$categoria->id)}}" method="POST">
				@method('delete')
				@csrf
				</form>
				</td>
			</tr>
		@endforeach()
	</table>
@stop()