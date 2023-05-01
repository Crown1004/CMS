<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getPostsByUser($id)
    {
        $contents = $this->user::with('posts')->find($id); // get user with posts

        return view('user.profile', compact('contents'));
    }

    public function getCommentsByUser($id)
    {
        $contents = $this->user::with('comments')->find($id); // get user with comments

        return view('user.profile', compact('contents'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index', ['users' => $this->user::with('role')->get()]); // send the user with his role to the view
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
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        $password = Hash::make($request->password);
        $role_id = $request->role_id;

        $user = $this->user;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password;
        $user->role_id = $role_id;

        $user->save();

        return back()->with('success', __('تم إضافة المستخدم بنجاح'));
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
    public function edit($id)
    {
        $user = $this->user::find($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => "required",
            'role_id' => 'required',
        ]);

        $user = $this->user::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

        $user->save();

        return redirect(route('user.index'))->with('success', __('تم تعديل المستخدم بنجاح'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user::find($id)->delete();

        return back()->with('success', __('تم حذف المستخدم بنجاح'));
    }
}
