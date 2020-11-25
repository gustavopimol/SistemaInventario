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
    
        <h2 class="text-center my-5">FICHA DE COMPRA</h2>       
        {{-- @foreach($compras as $dc) --}}

        <label for="" class="col-md-2 col-form-label">CODIGO: {{$compras->idcompra}}</label><br><br>
        <label for="" class="col-md-2 col-form-label" >FECHA: {{$compras->fecha}}</label><br><br>
      {{--  <label for="" class="col-md-2 col-form-label">CAntidad: {{$dc->cantidad}}</label><br><br> --}}
        
        <label for="" class="col-md-2 col-form-label">ESTADO: {{$compras->estado}}</label><br><br>
        <label for="" class="col-md-2 col-form-label">CODIGO PROVEEDOR: {{$compras->proveedor->idproveedor}}</label><br><br>
        <label for="" class="col-md-2 col-form-label">PROVEEDOR: {{$compras->proveedor->proveedor}}</label><br><br>
        <label for="" class="col-md-2 col-form-label">COSTO TOTAL: {{$compras->costoTotal}}</label><br><br> 
        {{-- @endforeach --}}

        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
            <tr>
              
      
              <th>PRODUCTO</th>
              <th>DESCRIPCION</th>
              <th>PRECIO COMPRA</th>
              <th>CANTIDAD</th>
       
            </tr>
            </thead>
            <tbody>
               {{--  @foreach($productos as $prod)  
              
                  <tr>
                          <td>{{$prod->producto}}</td>
                          <td>{{$prod->descripcion}}</td>    
                          <td>{{$prod->precioCompra}}</td>  
                          <td> {{$prod->cantidad}}</td> 
                                          
                   </tr>
                 @endforeach   --}}    
                 @foreach($compras->productos as $prod)  
              
                 <tr>
                         <td>{{$prod->producto}}</td>
                         <td>{{$prod->descripcion}}</td>    
                         <td>{{$prod->precioCompra}}</td>  
                         <td> {{$compras->cantidad}}</td> 
                                         
                  </tr>
                  
                @endforeach 
            </tbody>
       </table>
  
</body>

</html>