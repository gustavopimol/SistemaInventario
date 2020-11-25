<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Proveedor;
use App\Producto;
use App\Compraproductos;
use DB;
class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $buscar=$request->get('buscar');
        $proveedores=Proveedor::all();
        $compras=DB::table('compras as C')->join('proveedores  as P','C.idproveedor','=','P.idproveedor')
        ->select('C.idcompra','C.fecha','C.costoTotal','C.cantidad','C.cantidad','P.proveedor','C.estado')
        ->where('idcompra','like','%'.$buscar.'%')
        ->paginate(5);
        return view('compra.index', ['proveedores'=>$proveedores,'compras'=>$compras,'buscar'=>$buscar]);
        //
       /*  if($request)
        {
            $query=trim($request->get('searchText'));
            $matriculas=DB::table('matriculas as m')->join('alumnos as a','a.idalumno','=','m.idalumno')->where('a.nombres','LIKE','%'.$query.'%')->paginate(5);
            return view('Matriculas.index',['matriculas'=>$matriculas,'searchText'=>$query]);  
        } */
          
    


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedores=Proveedor::all();
        $productos=Producto::all();
        return view('compra.create',compact('proveedores','productos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        
        DB::select('call grabacompra("'.$request->idproveedor.'","'.now().'","'.$request->costoTotal.'","'.$request->cantidad.'","EMITIDA")');
               $productos=$request->idproductos;
               $compra=Compra::all()->last();
         
               foreach ($productos as $prod)
               {   
                   DB::select('call grabacompraproductos("'.$compra->idcompra.'","'.$prod[0].'")');
               }
            

               /* $dcompra=DB::table('compras as m')->join('proveedores as p','m.idproveedor','=','p.idproveedor')
               ->select('m.idcompra','m.fecha','m.costoTotal','m.cantidad','m.estado','p.idproveedor','p.proveedor')
               ->where('m.idcompra','=',''.$compra->idcompra.'')->get(); */
               $productos=DB::table('productos as c')->join('compraproductos as mp','c.idproducto','=','mp.idproducto')
                  
               ->where('mp.idcompra','=',''.$compra->idcompra.'')->get();
               $compras=Compra::all()->last();
               /* dd($compras->proveedor->proveedor); */
               $pdf = \PDF::loadView('compra.fichacompra',compact(/* 'dcompra', */'productos','compras'));        
               return $pdf->stream('fichacompra.pdf');       
        /* try{
            DB::beginTransaction();
            $compra=new Compra();
            $compra->idproveedor=$request->idproveedor;
            $compra->fecha=now();
            $compra->costoTotal=$request->costoTotal;
            $compra->estado='EMITIDA';
            $compra->save();
            $productos=$request->idproductos;
            foreach ($productos as $prod)
            {
                $compraproducto=new Compraproductos();
                $compraproducto->idcompra=$compra->idcompra;
                $compraproducto->idproducto=$prod[0];
                $compraproducto->save();
             } */
           /* DB::commit();
        }
        catch(\Exception $e)
        {
            dd($e);
            DB::rollback();
        }
        return redirect()->route('compra.index');  */    
            

       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $compra=Compra::find($id);
        return  view('compra.show',compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proveedores=Proveedor::all();
        $compra=Compra::find($id);
        return view('compra.edit',compact('compra','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Compra::find($id)->update($request->all());
        return redirect()->route('compra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Compra::find($id)->delete();
        return redirect()->route('compra.index');
    }
}
