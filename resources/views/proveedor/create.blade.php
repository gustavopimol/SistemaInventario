@extends('layouts.plantilla')
@section('contenido')
<div class="bg-white">


	<div class="card ">
		<div class="card-header">
			<h2 class="font-weight-bold">REGISTRO DE PROVEEDOR</h2>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="col-8 m-auto borde mb-3">
				<div class="form-groUp modal-content bg-dark p-5 mb-4">
					<form method="post" action="{{ action('ProveedorController@store') }}">
						@csrf
						<label for="Nombre " class="text-success font-weight-bold">PROVEEDOR</label>
						<input type="text" name="proveedor"
							class="form-control text-white font-weight-bold bg-dark border-success mb-1" required="">
						<label for="Direccion" class="text-success font-weight-bold">DIRECCION</label>
						<input type="text" name="direccion"
							class="form-control  text-white font-weight-bold bg-dark border-success" required="">
						<label for="Telefono" class="text-success font-weight-bold">TELEFONO</label>
						<input type="text" name="telefono"
							class="form-control  text-white font-weight-bold bg-dark border-success" required="">
						<label for="Email" class="text-success font-weight-bold">E-MAIL</label>
						<input type="text" name="email"
							class="form-control  text-white font-weight-bold bg-dark border-success mb-3" required="">
						<div class="text-center ">
							<button type="submit" class="btn btn-success font-weight-bold "
								onclick="return confirm('Grabar ?')"><i class="fas fa-save"> GUARDAR</i></button>
							<hr class="bg-secondary">
							<a href="{{ route('proveedor.index')}}" class="btn btn-danger font-weight-bold"><i
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