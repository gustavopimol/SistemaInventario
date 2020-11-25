<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    //
    protected $fillable=['almacen','descripcion'];
    public $timestamps=false;
    protected $table="almacenes";
    protected $primaryKey="idalmacen";
}
