<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('name', '!=', config('system.default_role.admin'))->get();
        return view('admin.acl.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.acl.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required|unique:roles,name|max:255',
        ]);

        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);

        $role->givePermissionTo($request->permissions);

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Role And Permission Setup'), 'goto' => route('admin.user.role.index')]);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if ($id == 1) {
            return abort(404);
        }
        $role = Role::with(['permissions'])
            ->find($id);
        $role_permissions = [];
        foreach ($role->permissions as $role_perm) {
            $role_permissions[] = $role_perm->name;
        }

        $role = Role::where('id', $id)->firstOrFail();

        $permissions = Permission::all();
        return view('admin.acl.edit', compact('role', 'permissions', 'role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $role = Role::where('id', $id)->firstOrFail();
        $validator = $request->validate([
            'name' => ['required', 'max:255',
                Rule::unique('roles', 'name')->ignore($role->id)],
        ]);

        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Role And Permission Updated'), 'goto' => route('admin.user.role.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      if (!auth()->user()->can('role.delete')) {
            abort(403, 'Unauthorized action.');
        }
        if (request()->ajax()) {

            $role = Role::where('id', $id)->firstOrFail();
            $role->delete();

            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Role And Permission Delete'),'load'=>true]);
        }
    }
}
