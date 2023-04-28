<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission->all();
        return view('admin.permission.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        // $request->permission is an array  name="permission[]" with the selected permissions
        Role::find($request->role_id)->permissions()->sync($request->permission); // sync() is a method to update the pivot table instead of using attach() and detach() it will add new permissions in the permission[] array and delete the old ones that are not in the array from the pivot tableW

        return back()->with('success', __('تم تحديث الصلاحيات بنجاح'));
    }
}
