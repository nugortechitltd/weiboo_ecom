<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Svg\Tag\Rect;

class RoleController extends Controller
{
    //Role
    // function role() {
    //     $permission = Permission::all();
    //     $roles = Role::all();
    //     $users = User::all();
    //     return view('backend.role.role', [
    //         'permission' => $permission,
    //         'roles' => $roles,
    //         'users' => $users,
    //     ]);
    // }

    // permission_store
    // function permission_store(Request $request) {
    //     $request->validate([
    //         'permission' => 'required',
    //     ]);
    //     Permission::create(['name' => $request->permission]);
    //     return back()->withSuccess($request->permission.'Permission created successfully');
    // }

    // role_store
    // function role_store(Request $request) {
    //     $request->validate([
    //         'role' => 'required',
    //     ]);
    //     $role = Role::create(['name' => $request->role]);
    //     $role->givePermissionTo($request->permission);
    //     return back()->withSuccess($request->role.'Role created successfully');
    // }

    // role_assign
    // function role_assign(Request $request) {
    //     $user = User::find($request->user_id);
    //     $user->syncRoles($request->role_id);
    //     return back()->with('success','Role assigned successfully');
    // }

     // remove_user_role
    //  function remove_user_role($user_id) {
    //     $user = User::find($user_id);
    //     $user->syncRoles([]);
    //     $user->syncPermissions([]);
    //     return back()->with('success','Role removed successfully');
    // }

    // edit_role
    // function edit_role($role_id) {
    //     $permission = Permission::all();
    //     $role = Role::find($role_id);
    //     return view('backend.role.edit_role', [
    //         'role' => $role,
    //         'permission' => $permission,
    //     ]);
    // }

    // role_update
    // function role_update(Request $request) {
    //     $role = Role::find($request->role_id);
    //     $role->syncPermissions([$request->permission]);
    //     return back()->withSuccess('Role updated successfully');
    // }
}
