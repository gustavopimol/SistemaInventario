<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title></title>
</head>

<body>
    
        <h2 class="text-center my-1">LISTA DE PRODUCTOS</h2>       


        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
            <tr>
              <th>CODIGO</th>
              <th>PRODUCTO</th>
              <th>DESCRIPCION</th>
              <th>ALMACEN</th>
              <th>CATEGORIA</th>
              <th>FECHA REGISTRO</th>
              <th>PRECIO VENTA</th>
              
             
            </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)  
              
                  <tr>
                          <td>{{$producto->idproducto}}</td>
                          <td>{{$producto->producto}}</td>    
                         <td>{{$producto->descripcion}}</td>  
                         <td>{{$producto->almacen}}</td>  
                        <td>{{$producto->categoria}}</td>
                        <td>{{$producto->fechaRegistro}}</td>
                        <td>{{$producto->precioVenta}}</td>        
                         
                   </tr>
                 @endforeach      
            </tbody>
       </table>
  
</body>

</html>