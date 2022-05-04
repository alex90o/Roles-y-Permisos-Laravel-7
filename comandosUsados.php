<?php

use App\Permisos\Models\Role;
use Illuminate\Routing\Route;

Route::get('/prueba', function(){

// return  Role::create ([
// 'nombre' => 'Admin',
// 'slug' => 'admin',
// 'descripcion' => 'Administrador',
// 'full-access' => 'yes',
// ]);
//  return  Role::create ([
// 'nombre' => 'Guest',
// 'slug' => 'guest',
// 'descripcion' => 'guest',
// 'full-access' => 'no',
//  ]);
/*
return  Role::create ([
    'nombre' => 'test',
    'slug' => 'test',
    'descripcion' => 'test',
    'full-access' => 'no',
     ]);
*/
     //$user = User::find(1);
    // $user->roles()->attach([1,3]); //attach crea registros 
    //$user->roles()->detach([1]); //detach elimina
    //$user->roles()->detach([3]);
    //$user->roles()->sync([1]);// sync crea si no esta creado y elimina si esta creado y no en el vector
    //$user->roles()->attach([1,2,3]); 
    //$user->roles()->sync([1,2]);
    // return $user->roles;
/*
    return  Permission::create ([
        'nombre' => 'Crear producto',
        'slug' => 'producto.create',
        'descripcion' => 'El usuario puede crear un producto',
       
         ]);
*//*
return  Permission::create ([
'nombre' => 'listar producto',
'slug' => 'producto.listar',
'descripcion' => 'El usuario puede crear una lista de producto',

 ]);
 */
     $role = Role::find(2);
     //$user->roles()->sync([1,2]);
     $role->permissions()->sync([1,2]);
     return $role->permissions;

}
);