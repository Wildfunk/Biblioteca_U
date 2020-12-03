<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class editorial extends Model
{
    public $timestamps=false;
    use SoftDeletes;
    
    public function libros(){
        return $this->hasMany('App\Libro');
    }
}
