<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;



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

    // Updating User info
    public function update(User $user) {
        // Data validation
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
      
        $user->update($data);

        Toastr::success('User updated successfuly!', 'System message');

        return back();
    }

    // Deleting a User
    public function destroy(User $user) {
        $random_email = STR::random(30);

        $user->first_name = 'Deleted';
        $user->last_name = 'User';
        $user->email = $random_email . '@deleted.com';
        $user->save();

        Toastr::success('User Removed successfuly!', 'System message');

        return redirect(route('user.index'));
    }

    // Attaching a role to the user
    public function attach(User $user) {
        $user->roles()->attach(request('role'));

        Toastr::success('Role attached successfuly!', 'System message');

        return redirect(route('user.show', $user->id));
    }

    // Detaching a role to the user
    public function detach(User $user) {
        $user->roles()->detach(request('role'));

        Toastr::success('Role detached successfuly!', 'System message');

        return redirect(route('user.show', $user->id));
    }
}
