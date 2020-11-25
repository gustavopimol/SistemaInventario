@extends('layouts.plantilla')
@section('contenido')
<div class="bg-white">


<div class="card ">
	<div class="card-header">
	  <h2 class="font-weight-bold">EDICION DE CATEGORIA</h2>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="col-8 m-auto borde mb-3">
			<div class="form-group modal-content bg-dark p-5 mb-4">
			<form method="POST" action="{{ action('CategoriaController@update',$categoria->idcategoria) }}">
				@csrf
				{{ method_field('PUT') }}
			{{-- <input name="_method" type="hidden" value="PATCH"> --}}
			<label for="Nombre" class="text-success font-weight-bold">CATEGORIA</label>
			<input type="text" name="categoria" class="form-control text-white font-weight-bold bg-dark border-success mb-1" value="{{ $categoria->categoria}}" required="">
			<label for="Direccion" class="text-success font-weight-bold">DESCRIPCION</label>
			<input type="text" name="descripcion" class="form-control text-white font-weight-bold bg-dark border-success mb-1" value="{{ $categoria->descripcion}}" required="">
						
			<div class="text-center ">
				<button type="submit" class="btn btn-success font-weight-bold " onclick="return confirm('Grabar ?')"><i class="fas fa-save">  GUARDAR</i></button>
				<hr class="bg-secondary">
				<a href="{{ route('categoria.index')}}" class="btn btn-danger font-weight-bold"><i class="fas fa-chevron-circle-left">  VOLVER</i></a>
			<!--<input type="submit" value="GUARDAR" class="btn btn-success font-weight-bold">-->
			</div>
			</form>	
			</div>		
		</div>	  
	</div>
	<!-- /.card-body -->
	
  </div>
	<!-- /.card -->


</div>
@stop
