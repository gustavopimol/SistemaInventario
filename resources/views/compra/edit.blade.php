@extends('layouts.plantilla')
@section('contenido')
<div class="bg-white">


	<div class="card ">
		<div class="card-header">
			<h2 class="font-weight-bold">EDICION DE ESTADO DE COMPRA</h2>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="col-8 m-auto borde mb-3">
				<div class="form-group modal-content bg-dark p-5 mb-4">
					<form method="POST" action="{{ action('CompraController@update',$compra->idcompra) }}">
						@csrf
						{{ method_field('PUT') }}
						{{-- <input name="_method" type="hidden" value="PATCH"> --}}
						<div class="form-group">
							<h4 class="text-success font-weight-bold">PROVEEDOR</h4>
							<select class="form-control" name="idproveedor" id="idproveedor">
								@foreach($proveedores as $proveedor)
								<option value="{{$proveedor->idproveedor}}"
									{{($proveedor->idproveedor==$compra->idproveedor)? 'selected':''}}>{{$proveedor->proveedor}}
								</option>
								@endforeach
							</select>
						</div>
						<h4 class="text-success font-weight-bold">Fecha</h4>
						<input type="date" name="fecha" id="idfecha" class="form-control" value="{{$compra->fecha}}">
						<br>
						<h4 class="text-success font-weight-bold">Estado</h4>
						<select class="form-control mb-3" name="estado" id="">
							<option value="EMITIDA" {{'EMITIDA'== old('estado',$compra->estado) ? 'selected' : '' }}>
								EMITIDA</option>
							<option value="ANULADA" {{'ANULADA'==old('estado',$compra->estado) ? 'selected' : ''  }}>
								ANULADA</option>

						</select>
						
							<div class="text-center ">
								<button type="submit" class="btn btn-success font-weight-bold " onclick="return confirm('Grabar ?')" ><i class="fas fa-save">  GUARDAR</i></button>
								<hr class="bg-secondary">
								<a href="{{ route('compra.index')}}" class="btn btn-danger font-weight-bold"><i class="fas fa-chevron-circle-left">  VOLVER</i></a>
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
<script type="text/javascript">
	$('#idproveedor').attr("disabled",true);
	$('#idfecha').attr("disabled",true);	
</script>
@stop