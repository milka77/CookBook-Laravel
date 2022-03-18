<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //
    public function index() {
        $users = User::paginate(10);

        return view('admin.user.index-user', ['users'=>$users]);
    }

    // Displaying The Users Details
    public function show(User $user) {
        $roles = Role::all();

        return view('admin.user.show-user', ['user'=>$user, 'roles'=>$roles]);
    }

    // Attaching a role to the user
    public function attach(User $user) {
        $user->roles()->attach(request('role'));

        return redirect(route('user.show', $user->id));
    }

    // Detaching a role to the user
    public function detach(User $user) {
        $user->roles()->detach(request('role'));

        return redirect(route('user.show', $user->id));
    }
}
