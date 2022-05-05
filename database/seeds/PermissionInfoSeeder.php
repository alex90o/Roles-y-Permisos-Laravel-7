<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //trucate tablas
        DB::statement("SET foreign_key_checks=0");
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");
        //user admin
        $useradmin = User::where('email', 'admin@admin.com')->first();
        if ($useradmin) {
            $useradmin->delete();
        }
        $useradmin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'), // password
        ]);

        //rol admin
        $roladmin = Role::create([
            'nombre' => 'Admin',
            'slug' => 'admin',
            'descripcion' => 'Administrador',
            'full-access' => 'yes',
        ]);

        //tabla role_user
        $useradmin->roles()->sync([$roladmin->id]);

        //permisos
        $permission_all = [];


        //permisos de los roles
        $permiso = Permission::create([
            'nombre' => 'Lista de roles',
            'slug' => 'role.index',
            'descripcion' => 'Usuario puede listar roles',

        ]);
        $permission_all[] = $permiso->id;

        $permiso = Permission::create([
            'nombre' => 'ver rol',
            'slug' => 'role.show',
            'descripcion' => 'Un Usuario puede ver un rol',

        ]);
        $permission_all[] = $permiso->id;

        $permiso = Permission::create([
            'nombre' => 'Crear rol',
            'slug' => 'role.create',
            'descripcion' => 'Un Usuario puede crear un rol',

        ]);
        $permission_all[] = $permiso->id;

        $permiso = Permission::create([
            'nombre' => 'Editar rol',
            'slug' => 'role.edit',
            'descripcion' => 'Un Usuario puede editar un rol',

        ]);
        $permission_all[] = $permiso->id;

        $permiso = Permission::create([
            'nombre' => 'Eliminar rol',
            'slug' => 'role.destroy',
            'descripcion' => 'Un Usuario puede eliminar un rol',

        ]);
        $permission_all[] = $permiso->id;

         //tabla permissions_role
         $roladmin->permissions()->sync($permission_all);


           //permisos de los usuarios
        $permiso = Permission::create([
            'nombre' => 'Lista de usuarios',
            'slug' => 'usuario.index',
            'descripcion' => 'Usuario puede listar usuarios',

        ]);
        $permission_all[] = $permiso->id;
        
        $permiso = Permission::create([
            'nombre' => 'ver usuario',
            'slug' => 'usuario.show',
            'descripcion' => 'Un Usuario puede ver un usuario',

        ]);
        $permission_all[] = $permiso->id;

        /*
        $permiso = Permission::create([
            'nombre' => 'Crear usuario',
            'slug' => 'usuario.create',
            'descripcion' => 'Un Usuario puede crear un usuario',

        ]);
        $permission_all[] = $permiso->id;
        */
        $permiso = Permission::create([
            'nombre' => 'Editar usuario',
            'slug' => 'usuario.edit',
            'descripcion' => 'Un Usuario puede editar un usuario',

        ]);
        $permission_all[] = $permiso->id;

        $permiso = Permission::create([
            'nombre' => 'Eliminar usuario',
            'slug' => 'usuario.destroy',
            'descripcion' => 'Un Usuario puede eliminar un usuario',

        ]);
        $permission_all[] = $permiso->id;

         //tabla permissions_role
         //$roladmin->permissions()->sync($permission_all);

    }
}
