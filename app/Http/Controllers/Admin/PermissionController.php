<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('superAdmin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('superAdmin.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|min:3',
        ]);

        Permission::create($validated);

        return to_route('superAdmin.permissions.index')->with('message','Created successfully');
    }

    public function edit(Permission $permission)
    {
        return view('superAdmin.permissions.edit', compact('permission'));
    }

    //update the permission
    public function update(Request $request, Permission $permission):RedirectResponse
    {
        $validated = $request->validate([
            'name'=>'required|min:3',
        ]);
        //updating the model
        $permission->update($validated);

        return to_route('superAdmin.permissions.index')->with('message','Updated successfully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('message', 'Successfully Deleted');
    }
}
