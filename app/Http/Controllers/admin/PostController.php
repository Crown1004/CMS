<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->post::with('user', 'category')->get(); // get user and category data because i will show the post owner and category name in the table

        return view('admin.posts.all', compact('posts'));
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
        //
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
        $post =  $this->post = $this->post::find($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request['approved'] = $request->has('approved'); // check if the approved checkbox is checked or not

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_new_name = time() . $file->getClientOriginalName(); // save the image with time . original name
            $file->storeAs('public/images', $file_new_name);
        }

        $this->post->find($id)->update($request->all() + ['image_path' => $file_new_name ?? $this->post->find($id)->image_path]); // if the image is not updated keep the old image

        return redirect(route('posts.index'))->with('success', __('تم تعديل المنشور بنجاح'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->post->find($id)->delete();

        return redirect(route('posts.index'))->with('success', __('تم حذف المنشور بنجاح'));
    }
}
