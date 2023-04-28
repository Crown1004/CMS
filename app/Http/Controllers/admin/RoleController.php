<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public $role;

    public function __construct(Role $role)
    {
        $this->role =  $role;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->role->all();

        return view('admin.roles.all', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required'
        ]);

        // role is a model -> role is the column name in the database
        $this->role->role = $request->name;
        $this->role->save();

        return back()->with('success', __('تم إضافة الدور بنجاح'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->role->find($id)->delete();

        return back()->with('success', __('تم حذف الدور بنجاح'));
    }
}
