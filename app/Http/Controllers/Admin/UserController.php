<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('superAdmin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('superAdmin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $password = $request->input('password');

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Send email to the user with the password
        Mail::to($user->email)->send(new WelcomeEmail($user, $password));

        return redirect()->route('superAdmin.users.create')->with('message', 'User created successfully.');
    }

    public function show(User $user)
    {
        $roles = Role::all();

        return view('superAdmin.users.role', compact('user','roles'));
    }

    public function assignRole(Request $request, User $user) {

        if($user->hasRole($request->role)){
            return back()->with('message', 'Role already exists');
        }
        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned');
    }
    public function removeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('message', 'Role removed');
        }
        return back()->with('message', 'Role does not exist');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('message', 'User removed');
    }
}
