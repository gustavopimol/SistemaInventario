<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title> PRODUCTO</title>
</head>

<body>


    <div class="contianer">
        @foreach($productos as $prod)
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2>PRODUCTO {{$prod->producto}}</h2>
            </div>
        </div>
        <div class="row ">
            <div class=" col-lg-3">
                <label  class=" font-weight-bold col-md-2 col-form-label">CODIGO:{{$prod->idproducto}}</label>
            </div>
            
            <div class=" col-lg-3">
                <label  class=" font-weight-bold col-md-2 col-form-label" style="margin-left: 60%;">FECHA REGISTRO:{{$prod->fechaRegistro}}</label>{{-- <label></label> --}}
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-3">
                <label class=" font-weight-bold col-md-2 col-form-label">ALMACEN:{{$prod->almacen}}</label>
            </div>
            <div class="col-lg-3">
                <label class=" font-weight-bold col-md-2 col-form-label" style="margin-left: 60%;">CATEGORIA: {{$prod->categoria}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label class=" font-weight-bold col-md-2 col-form-label">DESCRIPCION: {{$prod->descripcion}}</label>
                
            </div>
            <div class="col-lg-3">
                <label class=" font-weight-bold col-md-2 col-form-label" style="margin-left: 60%;"> PRECIO VENTA: {{$prod->precioVenta}}</label>
            </div>
        </div>


        {{--   <label>CODIGO:</label>{{$prod->idproducto}}<br> 
     <label>PRODUCTO:</label>{{$prod->producto}}<br> 
        <label>DESCRIPCION:</label>{{$prod->descripcion}}<br> 
        <label>ALMACEN:</label>{{$prod->almacen}}<br>
        <label>CATEGORIA:</label>{{$prod->categoria}}<br>
      <label>FECHA REGISTRO:</label>{{$prod->fechaRegistro}}<br> 
      <label>PRECIO VENTA:</label>{{$prod->precioVenta}}<br> --}}

        @endforeach
    </div>

</body>

</html>