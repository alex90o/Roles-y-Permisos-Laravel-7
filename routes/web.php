<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Use App\User;
Use App\Permisos\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
         $user = User::find(1);
        // $user->roles()->attach([1,3]); //attach crea registros 
        //$user->roles()->detach([1]); //detach elimina
        //$user->roles()->detach([3]);
        //$user->roles()->sync([1]);// sync crea si no esta creado y elimina si esta creado y no en el vector
        //$user->roles()->attach([1,2,3]); 
        $user->roles()->sync([1,2]);
         return $user->roles;


}
);