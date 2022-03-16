<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends Controller
{
    //
    public function index() {
        $roles = Role::all();

        return view('admin.role.index-role', ['roles'=>$roles]);
    }

    public function create() {
        return view('admin.role.new-role');
    }


    public function store() {
        // Field validation
        request()->validate([
            'name' => 'required|min:4',
        ]);

        $role = new Role;
        $role->name = Str::lower(request('name'));
        $role->name = Str::ucfirst($role->name);
        $role->slug = Str::slug(request('name'), '_');
        $role->save();

        Toastr::success('Role added successfuly!', 'System message');

        return redirect(route('role.index'));
    }

    // Edit a Role 
    public function edit(Role $role) {

        return view('admin.role.edit-role', ['role'=>$role]);
    }

    // Update a Role in the DB
    public function update(Role $role) {
        // Field validation
        request()->validate([
            'name' => 'required|min:4',
        ]);

        $role->name = Str::lower(request('name'));
        $role->name = Str::ucfirst($role->name);
        $role->slug = Str::slug(request('name'), '_');
        $role->save();

        Toastr::success('Role updated successfuly!', 'System message');

        return redirect(route('role.index'));
    }

    // Deleting a Role
    public function destroy(Role $role) {
        $role->delete();

        Toastr::success('Category was deleted!', 'System message');

        return redirect(route('role.index'));
    }
}
