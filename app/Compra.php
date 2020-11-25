<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //
    protected $primaryKey='idcompra';
    protected $fillable=['fecha','costoTotal','cantidad','idproveedor','estado'];
    public $timestamps=false;
    protected $table="compras";
    
    public function productos()
    {
        return $this->belongsToMany('App\Producto','compraproductos','idcompra','idproducto');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor','idproveedor','idproveedor');
    }

}
