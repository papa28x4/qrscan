<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Models\User;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::paginate();
        return view('backend.permissions.index', compact('permissions'));
    }

    public function create(){
        return view('backend.permissions.create');
    }

    public function store(PermissionRequest $request){
        try{
            Permission::create(['name' =>  $request->name]);
            return redirect()->route('permissions.index')->with('message', "{$request->name} permission has been created.");
        }catch(\Throwable $err){
            return redirect()->route('permissions.create')->with('error', $err->getMessage());
        }
    }

    public function edit(Permission $permission){
        return view('backend.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, Permission $permission){
        $permission = $permission->update(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('message', "Permission has been updated");
    }

    public function destroy(Permission $permission){
        if($permission->delete()){
            return redirect()->route('permissions.index')->with('message', "permission has been deleted successfully");
        }
    }
}
