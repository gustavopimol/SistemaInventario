<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $fillable=['proveedor','direccion','telefono','email'];
    public $timestamps=false;
    protected $table="proveedores";
    protected $primaryKey="idproveedor";


    public function compras()
    {
        return $this->belongsToMany('App\Compra','idproveedor','idcompra');
    }


}
