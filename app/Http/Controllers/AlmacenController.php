<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Almacen;
use DB;
class AlmacenController extends Controller
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
        $almacenes=DB::table('almacenes as a')->select('a.idalmacen','a.almacen','a.descripcion')->where('almacen','like','%'.$buscar.'%')->paginate(5);
        return view('almacen.index',['almacenes'=>$almacenes,'buscar'=>$buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('almacen.create');
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
        Almacen::create($request->all());
        return redirect()->route('almacen.index');
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
        $almacen=Almacen::find($id);
        return view('almacen.show',['almacen'=>$almacen]); 
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
        $almacen=Almacen::find($id);
        return view('almacen.edit',['almacen'=>$almacen]);
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
       Almacen::find($id)->update($request->all());
        return redirect()->route('almacen.index');
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
        Almacen::find($id)->delete();
        return redirect()->route('almacen.index');
    }
}
