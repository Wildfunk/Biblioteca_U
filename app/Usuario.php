<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticable
{
    use Notifiable;
    protected $table = "usuarios";
    protected $primaryKey = "rut";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps=false;
}
