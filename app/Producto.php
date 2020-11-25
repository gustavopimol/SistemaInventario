<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    
    protected $fillable=['producto','descripcion','fechaRegistro','precioVenta','precioCompra','idalmacen','idcategoria'];
    public $timestamps=false;
    protected $primaryKey="idproducto";
}
