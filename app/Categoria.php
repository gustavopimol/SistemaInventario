<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    
    protected $fillable=['categoria','descripcion'];
    public $timestamps=false;
    protected $table="categorias";
    protected $primaryKey="idcategoria";
}
