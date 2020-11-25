@extends('layouts.plantilla')
@section('contenido')
<div class="bg-white">


	<div class="card ">
		<div class="card-header">
			<h2 class="font-weight-bold">REGISTRO DE COMPRA</h2>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="col-12  m-auto borde mb-3">
				<div class="form-group modal-content bg-dark p-3 mb-3">
					<form method="POST" action="{{ action('CompraController@store') }}">
						@csrf
						{{-- INICIA ROW LLENAR CAMPOS--}}
						<div class="row">
							<div class="col-lg-4 col-xs-12 form-group">

								<div class="col-xs-12">
									<label for="Nombre " class="text-success font-weight-bold">PROVEEDOR</label>
									<select name="idproveedor" id="idproveedor" class="form-control  selectpicker text-white font-weight-bold bg-dark border-success "
									oninput="activar()"
										data-live-search="true">
										@foreach($proveedores as $proveedor)
										<option value="{{$proveedor->idproveedor}}">{{$proveedor->proveedor}}</option>
										@endforeach
									</select>

								</div>

								<div class="col-xs-12">
									<label for="Nombre " class="text-success font-weight-bold mt-1">PRODUCTO</label>
									<select name="idproducto" id="idproducto" class="form-control  selectpicker" oninput="activar();"
										data-live-search="true">
										@foreach($productos as $producto)
										<option
											value="{{$producto->idproducto}}_{{$producto->producto}}_{{$producto->descripcion}}_{{$producto->precioCompra}}">
											{{$producto->producto}}</option>
										@endforeach
									</select>
									
								</div>
								<div class="col-xs-12">
									<label for="Cantidad" class="text-success font-weight-bold">CANTIDAD</label>
									<input type="text" name="cantidad"  id="idcantidad"class="form-control  text-white font-weight-bold bg-dark border-success"   oninput="activar();">

								</div>
								
								<div class="col-xs-12 text-center mt-3">
									<input type="button" value="AGREGAR" id="btnagregar" class="btn btn-warning btn-lg btn-block"
										onclick="return agregar();" disabled>
								</div>
							</div>
							{{-- INICIO TABLA DETALLE --}}
							<div class="col">
								<div class="col-xs-12 text-center">
									
									<table id="detalle" class="table table-condensed table-bordred table-striped ">
										<tr class="">
											<td  class="text-success font-weight-bold" >PRODUCTO</td>
											<td  class="text-success font-weight-bold">DESCRIPCION</td>
											
											<td  class="text-success font-weight-bold">PRECIO COMPRA</td>
											<td  class="text-success font-weight-bold">CANTIDAD</td>
											<td  class="text-success font-weight-bold">ACCION</td>
										</tr>
									</table>
								</div>
								
							</div>
							{{-- FIN TABLA DETALLE --}}
						</div>
						{{-- FIN ROW LLENAR CAMPOS --}}
						<div class="row mt-2">
							<div class="col-xs-6 col-lg-6  ">
								<button type="submit" class="btn btn-success btn-lg font-weight-bold " id="btngrabar"
								onclick="return confirm('Grabar ?')"><i class="fas fa-save"> GUARDAR</i></button>
								&nbsp &nbsp &nbsp<a href="{{route('compra.index')}}" class="btn btn-danger btn-lg font-weight-bold"><i
									class="fas fa-chevron-circle-left"> VOLVER</i></a>

							</div>
							
							<div class="col-xs-6 col-lg-6">
								<label class="h3 font-weight-bold" for="" id="idcostos">COSTO TOTAL:0 </label>
							    <input type="hidden"  name="costoTotal" id="costoTotal">
							</div>
							
							
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

{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script> --}}
<script type="text/javascript">
	var indice=0;productos=[]; var producosto;totalcosto=0;
	$('#btngrabar').attr("disabled",true);
	function activar(){
        $contador1 = (document.getElementById("idproveedor").value=="")?0:1;
        $contador2 = (document.getElementById("idproducto").value=="")?0:1;
        $contador3 = (document.getElementById("idcantidad").value=="")?0:1;
       /*  $contador4 = (document.getElementById("nombre_2").value=="")?0:1; */
        if($contador1==1&&$contador2==1&&$contador3==1/* &&$contador4==1 */){
			
			$('#btnagregar').attr("disabled",false);
        }else{
			
			$('#btnagregar').attr("disabled",true);
		}
	}	
	function agregar()
	{   /* var producosto=1; */
		datocantidad=document.getElementById('idcantidad').value;
		datosproducto=document.getElementById('idproducto').value.split('_');
		for(p in productos){
				if(datosproducto[0]==productos[p])
				{
				alert("Producto ya Seleccionado");
				return false;}
			}
		productos[indice]=datosproducto[0];
		fila='<tr id="fila'+indice+'"><td><input type="hidden" name="idproductos[]" value="'+datosproducto[0]+'">'+datosproducto[1]+'</td><td>'+datosproducto[2]+'</td><td>'+datosproducto[3]+'</td><td>'+datocantidad+'</td><td><a href="#" class="btn btn-danger" onclick="quitar('+indice+','+datosproducto[3]+','+datocantidad+')">Quitar</a></td></tr>';
			$('#detalle').append(fila);
		indice++;
		producosto=parseFloat(datosproducto[3])*datocantidad;
		 totalcosto+=producosto; 
		$('#idcostos').html("Costo Total : "+totalcosto);
		$('#costoTotal').val(totalcosto);
		evaluar();
	}	

	function quitar(item,precio,cant)

	{  
		productos[item]="";
		$('#fila'+item).remove();
		indice--;
		producosto=parseFloat(precio)*cant;
		 totalcosto-=producosto; 
		$('#idcostos').html("Costo Total : "+totalcosto);
		$('#costoTotal').value(totalcosto);
		/* return false; */
		evaluar()
	}
	function evaluar(){
		if(indice>0){
			$('#btngrabar').attr("disabled",false);
		}else{
			$('#btngrabar').attr("disabled",true);
		}
	}
</script>
@stop