<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use DB;
class ProveedorController extends Controller
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
       /*  if($request)
        {
            $query=trim($request->get('searchText'));
            $proveedores=Proveedor::orderBy('idproveedor')->where('proveedor','LIKE','%'.$query.'%')->paginate(5);
            return view('proveedor.index',['proveedores'=>$proveedores,'searchText'=>$query]);  
        } */
        
        $buscar=$request->get('buscar');
        $proveedores=DB::table('proveedores as p')->select('p.idproveedor','p.proveedor','p.direccion','p.telefono','p.email')->where('proveedor','like','%'.$buscar.'%')->paginate(5);
        return view('proveedor.index',['proveedores'=>$proveedores,'buscar'=>$buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proveedor.create');
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
        /* Proveedor::create($request->all());
        return redirect()->route('proveedor.index'); */

        DB::beginTransaction();
        try {
        
            $proveedor=new Proveedor();
            $proveedor->proveedor=$request->proveedor;
            $proveedor->direccion=$request->direccion;
            $proveedor->telefono=$request->telefono;
            $proveedor->email=$request->email; 
            $proveedor->save();             
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }        
        return redirect()->route('proveedor.index');
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
        $proveedor=Proveedor::find($id);
        return view('proveedor.show',['proveedor'=>$proveedor]); 
         
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
        $proveedor=Proveedor::find($id);
        return view('proveedor.edit',['proveedor'=>$proveedor]);
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
        Proveedor::find($id)->update($request->all());
        return redirect()->route('proveedor.index');
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
        Proveedor::find($id)->delete();
        return redirect()->route('proveedor.index');
    }
}
