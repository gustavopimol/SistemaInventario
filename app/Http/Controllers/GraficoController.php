<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GraficoController extends Controller
{   
     public function __construct()
    {
        $this->middleware('auth');
    } 
    //
    public function index(){
      
        $registros=DB::select('select count(idproveedor) as VecesCompradas, productos.producto from compras inner join compraproductos on compras.idcompra = compraproductos.idcompra 
         inner join productos on compraproductos.idproducto = productos.idproducto group by productos.producto');
        return view('compra.graficosig',compact('registros'));
       
    }
}
