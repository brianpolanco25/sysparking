<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SaveUserRequest;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->paginate(25);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles')); 
    }

    public function store(SaveUserRequest $request)
    {
        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'type'          => $request->type,
            'status'        => $request->status,
            'entry_time'    => $request->entry_time,
            'out_time'      => $request->out_time,
            'password'      => Hash::make($request->password),
            'days'          => $request->days,
            
        ]); 

        $user->assignRole($request->role);

        alert()->success('Usuario creado','Usuario creado con éxito.')->autoclose(2000);

        return back();
    }

    public function show(Partner $partner)
    {
        //
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);

        $roles = Role::all();

        $days = $user->days;

        return view('users.edit', ['user' => $user, 'days' => $days, 'roles' => $roles]);
    }

    public function update(Request $request, $user)
    {
        $user = User::findOrFail($user);

        if($user->getRoleNames()->first()){

            $user->removeRole($user->getRoleNames()->first());

        }

        $user->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'type'          => $request->type,
            'status'        => $request->status,
            'entry_time'    => $request->entry_time,
            'out_time'      => $request->out_time,
            'password'      => Hash::make($request->password),
            'days'          => $request->days,
        ]);

        $user->assignRole($request->role);

        alert()->success('Usuario actualizado','Usuario actualizado con éxito.')->autoclose(2000);

        return back();
    }

    public function destroy($user)
    {
        $user = User::findOrFail($user);

        $user->delete();

        alert()->success('Usuario eliminado','Usuario eliminado con éxito.')->autoclose(2000);

        return back();
    }
}
