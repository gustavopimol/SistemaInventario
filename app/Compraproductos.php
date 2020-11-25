<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compraproductos extends Model
{
    //
    protected $primaryKey=['idcompra','idproducto'];
    protected $fillable=['idcompra','idproducto'];
    public $timestamps=false;
    public $incrementing=false;
}
