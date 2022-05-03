<?php

namespace App\Permisos\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
       //es: desde aca comienza
       protected $fillable = [
        'nombre', 'slug', 'descripcion',
    ];
       public function roles(){
        return $this->belongsToMany('App\Permisos\Models\Role')->withTimestamps();
    }
}
