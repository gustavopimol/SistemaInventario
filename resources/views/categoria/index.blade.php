@extends('layouts.plantilla')
@section('contenido')
<div class=" bg-white p-4">

<div class="card ">
  <div class="card-header">
    <h2 class="font-weight-bold">LISTADO DE CATEGORIA</h2>
  </div>
  <!-- /.card-header -->
  <div class="card-body" style="overflow: hidden;">
    <div class="row">
       <div class="col-8 mb-3">
           <a href="{{ action('CategoriaController@create') }}" class="btn btn-info font-weight-bold"><i class="fas fa-plus-circle">  AGREGAR CATEGORIA </i> </a>
       </div>
       <div class="col-4 ">
           <form class="form-inline my-2 my-lg-0">
             <input name="buscar" class="form-control mr-sm-3" type="search" placeholder="Buscar por Categoria..." aria-label="Search" value="{{$buscar}}">
             <button class="btn btn-success font-weight-bold my-2 my-sm-0" type="submit">Buscar</button>
           </form>
       </div>
    </div>
    <table id="example1" class="table table-bordered table-striped text-center">
      <thead>
      <tr>
        <th>ID CATEGORIA</th>
        <th>CATEGORIA</th>
        <th>DESCRIPCION</th>
        <th>ACCIONES</th>
      </tr>
      </thead>
      <tbody>
          @foreach($categorias as $categoria)  
        
            <tr>
                    <td>{{$categoria->idcategoria}}</td>
                    <td>{{$categoria->categoria}}</td>    
                    <td>{{$categoria->descripcion}}</td>  
                    <td>
                      
                       <form action="{{action('CategoriaController@destroy', $categoria->idcategoria)}}" method="post">
                        @csrf
                        <a class="btn btn-info btn-sm m-2" href="{{action('CategoriaController@edit', $categoria->idcategoria)}}">
                          <i class="fas fa-pencil-alt"></i> Edit</a>
                          <!-- <a class="btn btn-primary m-1" href="" >  EDITAR</a>-->
                          {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE"> 
                        <button type="submit" class="btn btn-danger btn-sm" value="ELIMINAR" onclick="return confirm('Eliminar ?')"> <i class="fas fa-trash">  Delete</i> </button>
                         <!-- <input type="submit" value="ELIMINAR" class="btn btn-danger m-1">-->  
                        </form>             
                    </td>
             </tr>
           @endforeach      
      </tbody>
    </table>
    <br>
    <div class="text-center m-auto"><h5 >{{$categorias->links()}}</h5></div>
  </div>
  <!-- /.card-body -->
</div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</div>
@stop
