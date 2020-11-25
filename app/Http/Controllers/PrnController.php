<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PrnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
        public function Imprimeproveedores()
        {
            $proveedores=DB::table('proveedores as p')->select('p.idproveedor','p.proveedor','p.direccion','p.telefono','p.email')->get();
            $pdf = \PDF::loadView('proveedor.rpproveedores',compact('proveedores'));        
            return $pdf->setPaper('a4','portrait')->download('rpproveedores.pdf');
        }       
        
       /* REPORTE PDF TODOS LOS PRODUCTOS */
        public function Imprimeproductos()
        {    
            $productos=DB::table('productos as x')->join('almacenes  as A','x.idalmacen','=','A.idalmacen')
        ->join('categorias as c','x.idcategoria','=','c.idcategoria')
        ->select('x.idproducto','x.producto','x.descripcion','x.fechaRegistro','x.precioVenta','x.precioCompra','A.almacen','c.categoria')->get();
            $pdf = \PDF::loadView('producto.rpproductos',compact('productos'));        
            return $pdf->setPaper('a4','landscape')->download('rpproductos.pdf');
        }
        /* REPORTE PDF POR CADA PRODUCTO */
        public function detalleproducto($id)
        {      
           $productos=DB::table('productos as x')->join('almacenes  as A','x.idalmacen','=','A.idalmacen')
        ->join('categorias as c','x.idcategoria','=','c.idcategoria')
        ->select('x.idproducto','x.producto','x.descripcion','x.fechaRegistro','x.precioVenta','x.precioCompra','A.almacen','c.categoria')->where('x.idproducto','=',$id)->get();
          $pdf = \PDF::loadView('producto.rpxproductos',compact('productos')); 
        return $pdf->stream('rpdtproductos.pdf');
          }
        

       


}
