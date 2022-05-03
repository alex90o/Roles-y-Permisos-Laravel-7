<?php

namespace App\Permisos\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //es: desde aca comienza
    protected $fillable = [
        'nombre', 'slug', 'descripcion', 'full-access'
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
