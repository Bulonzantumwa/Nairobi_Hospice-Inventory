<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use http\Exception\BadConversionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name',['super_admin'])->get();
        return view('superAdmin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('superAdmin.roles.create');
    }

    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'name'=>'required|min:3',
        ]);
        //save role to the database
        Role::create($validated);

        return to_route('superAdmin.roles.index')->with('message','Created successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('superAdmin.roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role):RedirectResponse
    {
        $validated = $request->validate([
            'name'=>'required|min:3',
        ]);
        $role->update($validated);

        return to_route('superAdmin.roles.index')->with('message','Updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message', 'Successfully deleted');
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message','Permission exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message','Permission added');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('message','Permission revoked');
        }
        return back()->with('message','Permission does not exist');
    }
}
