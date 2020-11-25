<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Almacen;
use App\Producto;
use DB;
class ProductoController extends Controller
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
        $almacenes=Almacen::all();
        $categorias=Categoria::all();
        $productos=DB::table('productos as x')->join('almacenes  as A','x.idalmacen','=','A.idalmacen')
        ->join('categorias as c','x.idcategoria','=','c.idcategoria')
        ->select('x.idproducto','x.producto','x.descripcion','x.fechaRegistro','x.precioVenta','x.precioCompra','A.almacen','c.categoria')
        ->where('producto','like','%'.$buscar.'%')
        ->paginate(5);
        return view('producto.index', ['almacenes'=>$almacenes, 'categorias'=>$categorias,'productos'=>$productos,'buscar'=>$buscar]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $almacenes=Almacen::all();
        $categorias=Categoria::all();
       return view('producto.create', ['almacenes'=>$almacenes, 'categorias'=>$categorias]);

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
        DB::beginTransaction();
        try {
            /* Producto::create($request->all()); */
            $producto=new Producto();
            $producto->producto=$request->producto;
            $producto->descripcion=$request->descripcion;
            $producto->fechaRegistro=$request->fechaRegistro;
           
            $producto->precioVenta=$request->precioVenta;
            $producto->precioCompra=$request->precioCompra;
            $producto->idalmacen=$request->idalmacen;
            $producto->idcategoria=$request->idcategoria;  
            $producto->save();             
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }        
        return redirect()->route('producto.index');


        /* Producto::create($request->all());
        return redirect()->route('producto.index'); */

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
        $almacenes=Almacen::all();
        $categorias=Categoria::all();
        $producto=Producto::find($id);
        return view('producto.edit',['almacenes'=>$almacenes, 'categorias'=>$categorias,'producto'=>$producto]);

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
        Producto::find($id)->update($request->all());
        return redirect()->route('producto.index');
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
        Producto::find($id)->delete();
        return redirect()->route('producto.index');

    }
}
