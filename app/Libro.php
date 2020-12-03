<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{

    use SoftDeletes;
    
    public function editorial(){
        return $this->belongsTo('App\Editorial');
    }
    public function autores(){
        return $this->belongsToMany('App\Autor');
    }
}
