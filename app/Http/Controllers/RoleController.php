<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id','Desc')->paginate(2);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::get();

        return view('roles.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate(
            [
                'nombre' => 'required|max:50|unique:roles,nombre',
                'slug' => 'required|max:50|unique:roles,slug',
                'full-access' => 'required|in:yes,no'
            ]
            );
            $rol = Role::create($request->all());

            if( $request->get('permiso')){
                $rol ->permissions()->sync($request->get('permiso'));
            }
            return redirect()->route('role.index')
            ->with('status_success', 'Rol guardado con éxito');
        //$rol = Role::create($request->all());
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permiso_rol=[];

        foreach($role->permissions as $permiso){
            $permiso_rol[]=$permiso->id;
        }
       // return $permiso_rol;
        $permisos = Permission::get();

        return view('roles.edit', compact('permisos','role','permiso_rol'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request ->validate(
            [
                'nombre' => 'required|max:50|unique:roles,nombre,'.$role->id,
                'slug' => 'required|max:50|unique:roles,slug,'.$role->id,
                'full-access' => 'required|in:yes,no'
            ]
            );
            $role -> update($request->all());

            if( $request->get('permiso')){
                $role ->permissions()->sync($request->get('permiso'));
            }
            return redirect()->route('role.index')
            ->with('status_success', 'Rol actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
       $role ->delete();


        return redirect()->route('role.index')
        ->with('status_success'.'Role successfully removed');

    }
}
