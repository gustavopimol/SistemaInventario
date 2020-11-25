@extends('layouts.plantilla')
@section('contenido')
<div class="bg-white">


  <div class="card ">
	<div class="card-header">
	  <h2 class="font-weight-bold">REGISTRO DE PRODUCTO</h2>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="col-8 m-auto borde mb-3" >
			<div class="form-group modal-content bg-dark p-5 mb-3">
			<form method="POST" action="{{ action('ProductoController@store') }}">
				@csrf
			<label for="Producto" class="text-success font-weight-bold">PRODUCTO</label>
			<input type="text" name="producto" class="form-control text-white font-weight-bold bg-dark border-success mb-1" required="">
			<label for="Descripcion" class="text-success font-weight-bold">DESCRIPCION</label>
			<input type="text" name="descripcion" class="form-control  text-white font-weight-bold bg-dark border-success mb-2" required="">
			
			<div class="row mb-2">
				<div class="col">
					<label for="" class="text-success font-weight-bold">ALMACEN </label>
					<select name="idalmacen" id="" required="" class="form-control  text-white font-weight-bold bg-dark border-success selectpicker"  data-live-search="true" >
						@foreach($almacenes as $almacen)
						<option value="{{$almacen->idalmacen}}" >{{$almacen->almacen}}</option>
						@endforeach
				    </select>
					
				</div>
				<div class="col">
					<label for="" class="text-success font-weight-bold">CATEGORIA </label>
					<select name="idcategoria" id="" required="" class="form-control text-white font-weight-bold bg-dark border-success  selectpicker"  data-live-search="true">
							@foreach($categorias as $categoria)
							<option value="{{$categoria->idcategoria}}">{{$categoria->categoria}}</option>
							@endforeach
					</select>
				</div>
			</div>
          
			<div class="row mb-1">
				<div class="col">
					<label for="Precio" class="text-success font-weight-bold">FECHA</label>
			        <input type="date" name="fechaRegistro" class="form-control  text-white font-weight-bold bg-dark border-success mb-3" required="">
				</div>
				{{-- <div class="col">
					<label for="stock" class="text-success font-weight-bold">STOCK</label>
			        <input type="text" name="stock" class="form-control  text-white font-weight-bold bg-dark border-success" required="">
			
				</div> --}}
				
			</div>
			<div class="row mb-1">
				<div class="col">
					<label for="Cantidad" class="text-success font-weight-bold">PRECIO VENTA</label>
			        <input type="text" name="precioVenta" class="form-control  text-white font-weight-bold bg-dark border-success" required="">
			
				</div>
				<div class="col">
					<label for="Precio" class="text-success font-weight-bold">PRECIO COMPRA</label>
			        <input type="text" name="precioCompra" class="form-control  text-white font-weight-bold bg-dark border-success mb-2" required="">
				</div>
			</div>
            
			<div class="text-center ">
				<button type="submit" class="btn btn-success font-weight-bold " onclick="return confirm('Grabar ?')"><i class="fas fa-save">  GUARDAR</i></button>
				<hr class="bg-secondary">
				<a href="{{ route('producto.index')}}" class="btn btn-danger font-weight-bold"><i class="fas fa-chevron-circle-left">  VOLVER</i></a>
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
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>$('.select2').select2();</script>
@stop
