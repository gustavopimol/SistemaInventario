@extends('layouts.plantilla')
@section('contenido')
<div class="bg-white">


	<div class="card ">
		<div class="card-header">
			<h2 class="font-weight-bold">EDICION DE PRODUCTO</h2>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="col-8 m-auto borde mb-3">
				<div class="form-group modal-content bg-dark p-5 mb-4">
					<form method="POST" action="{{ action('ProductoController@update',$producto->idproducto) }}">
						@csrf
						{{ method_field('PUT') }}
						{{-- <input name="_method" type="hidden" value="PATCH"> --}}
						<label for="Producto" class="text-success font-weight-bold">PRODUCTO</label>
						<input type="text" name="producto"
							class="form-control text-white font-weight-bold bg-dark border-success mb-1"
							value="{{ $producto->producto}}" required="">
						<label for="Descripcion" class="text-success font-weight-bold">DESCRIPCION</label>
						<input type="text" name="descripcion"
							class="form-control text-white font-weight-bold bg-dark border-success mb-1"
							value="{{ $producto->descripcion}}" required="">

						<div class="row mb-2">
							<div class="col">
								<label for="" class="text-success font-weight-bold">ALMACEN </label>
								<select name="idalmacen" id="" required=""
									class="form-control  text-white font-weight-bold bg-dark border-success selectpicker"
									data-live-search="true">

									@foreach($almacenes as $almacen)
									<option value="{{$almacen->idalmacen}}"
										{{($almacen->idalmacen==$producto->idalmacen)? 'selected':''}}>
										{{$almacen->almacen}}</option>
									@endforeach
								</select>

							</div>
							<div class="col">
								<label for="" class="text-success font-weight-bold">CATEGORIA </label>
								<select name="idcategoria" id="" required=""
									class="form-control text-white font-weight-bold bg-dark border-success  selectpicker"
									data-live-search="true">

									@foreach($categorias as $categoria)
									<option value="{{$categoria->idcategoria}}"
										{{($categoria->idcategoria==$producto->idcategoria)? 'selected':''}}>
										{{$categoria->categoria}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<label for="Cantidad" class="text-success font-weight-bold">FECHA</label>
						<input type="date" name="fechaRegistro"
							class="form-control text-white font-weight-bold bg-dark border-success mb-1"
							value="{{ $producto->fechaRegistro}}" required="">
						{{-- <label for="stock" class="text-success font-weight-bold">STOCK</label>
						<input type="text" name="stock" class="form-control text-white font-weight-bold bg-dark border-success mb-1" value="{{ $producto->stock}}"
						required=""> --}}
						<label for="Precio" class="text-success font-weight-bold">PRECIO VENTA</label>
						<input type="text" name="precioVenta"
							class="form-control text-white font-weight-bold bg-dark border-success mb-3"
							value="{{ $producto->precioVenta}}" required="">
						<label for="Precio" class="text-success font-weight-bold">PRECIO COMPRA</label>
						<input type="text" name="precioCompra"
							class="form-control text-white font-weight-bold bg-dark border-success mb-3"
							value="{{ $producto->precioCompra}}" required="">

						<div class="text-center ">
							<button type="submit" class="btn btn-success font-weight-bold " onclick="return confirm('Grabar ?')"><i class="fas fa-save">
									GUARDAR</i></button>
							<hr class="bg-secondary">
							<a href="{{ route('producto.index')}}" class="btn btn-danger font-weight-bold"><i
									class="fas fa-chevron-circle-left"> VOLVER</i></a>
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