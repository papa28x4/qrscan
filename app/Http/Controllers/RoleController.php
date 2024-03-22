<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::paginate();
        return view('backend.roles.index', compact('roles'));
    }

    public function create(){
        return view('backend.roles.create');
    }

    public function store(RoleRequest $request){
        Role::create(['name' =>  $request->name]);
        return redirect()->route('roles.index')->with('role-created', "Role has been created.");
    }

    public function assign(Request $request){
        $user = User::find(29);
        return $user->assignRole('user');
    }

    public function edit(Role $role){
        $permissions = Permission::all();

        $all = count($permissions) === count($role->permissions) ? true : false;

        return view('backend.roles.edit', compact('role', 'permissions', 'all'));
    }

    public function update(Request $request, Role $role){
       
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.edit', $role->id)->with('message', "{$role->name} has been updated");
    }

    public function destroy(Role $role){
        if($role->delete()){
            return redirect()->route('roles.index')->with('role-deleted', "Role has been deleted successfully");
        }
    }

    // public function rolesAndUsers(){
    //     $roles = Role::all();
    //     return view('backend.roles.manage-users', compact('roles'));
    // }

    // public function displayUsers(Role $role){
    //     $role_users = $role->users;

    //     $users = User::all();

    //     return view('backend.roles.users', compact('users', 'role_users'));
    // }
}
