<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;
use Illuminate\Support\Facades\Hash;

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user admin
        $useradmin = User::create([
        'name' =>'admin' ,
        'email' =>'admin@admin.com',
        'password' => Hash::make('admin'), // password
        ]);
        
        
    }
}
