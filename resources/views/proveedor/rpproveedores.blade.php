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
    
        <h2 class="text-center my-5">LISTA DE PROVEEDORES</h2>       


        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
            <tr>
              <th>CODIGO</th>
              <th>PROVEEDOR</th>
              <th>DIRECCION</th>
              <th>TELEFONO</th>
              <th>E-MAIL</th>
       
            </tr>
          </thead>
            <tbody>
                @foreach($proveedores as $proveedor)  
              
                  <tr>
                          <td>{{$proveedor->idproveedor}}</td>
                          <td>{{$proveedor->proveedor}}</td>    
                         <td>{{$proveedor->direccion}}</td>  
                         <td>{{$proveedor->telefono}}</td>  
                        <td>{{$proveedor->email}}</td>        
                         
                   </tr>
                 @endforeach      
            </tbody>
       </table>
  
</body>

</html>