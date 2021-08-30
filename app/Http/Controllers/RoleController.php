<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index ()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    public function create ()
    {
        $permissions = Permission::get();
        
        return view('roles.create', ['permissions' => $permissions]);
    }

    public function store(Request $request){

        $role = Role::create(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        alert()->success('Rol creado','Rol creado con éxito.')->autoclose(2000);

        return redirect('/roles');

    }

    public function edit($id){

        $role = Role::find($id);
        $permissions = Permission::get();
        $id_permission = $role->permissions->pluck('id')->toArray();

        return view('roles.edit', ['role' => $role, 
                                    'permissions' => $permissions,
                                    'id_permission' => $id_permission]);
    }

    public function update(Role $role, Request $request){
        
        $role->syncPermissions($request->permissions);

        alert()->success('Rol actualizado','Rol actualizado con éxito.')->autoclose(2000);

        return redirect('/roles');
    }

    public function destroy($id){

        $role = Role::findOrfail($id);

        return "Debes quitar los permisos al rol y los usuarios a lo que esta asignado";    

        $role->revokePermissionTo($permission);
        
    }

}
