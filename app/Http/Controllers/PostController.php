<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the posts
        // $posts = $this->post::with('user:id,name,profile_photo_path')->whereApproved(1)->latest()->paginate(2); // user: is the relation user() in the post model
        $posts = $this->post::with('user:id,name,profile_photo_path')->approved()->paginate(10); // approved using model scope in the post model scopeApproved() function name is Approved scope is to use model scope
        $title = __('جميع المنشورات');

        return view('index', compact('posts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_new_name = time() . $file->getClientOriginalName(); // save the image with time . original name
            $file->storeAs('public/images', $file_new_name);
        }

        $request->user()->posts()->create($request->all() + ['image_path'=> $file_new_name ?? 'default.jpg']);

        return back()->with('success', __('تم إضافة المنشور بنجاح، سيظهر بعد أن يوافق عليه المسؤول'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // $post = $this->post::find($id);
        $post = $this->post::where('slug', $slug)->first();

        return view('posts.show', compact('post'));
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
        //
    }

    public function search(Request $request)
    {
        // search the column body '%' '%' trim the keyword(the name in the search field) form both sides
        $posts = $this->post::where('body', 'LIKE', '%' . $request->keyword . '%')->with('user')->approved()->paginate(10); // with('user') associated the user data with the post // approved using model scope in the post model scopeApproved() function name is Approved scope is to use model scope
        $title = __('نتائج البحث عن: ' . $request->keyword);

        return view('index', compact('posts', 'title'));
    }
}
