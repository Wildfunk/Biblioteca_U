<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{

    use SoftDeletes;
    
    public $timestamps=false;
    
    public function libros(){
        return $this->belongsToMany('App\Libro');
    }
}
