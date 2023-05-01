<?php

namespace App\Http\Controllers;

use App\Helpers\Slug;
use App\Models\Category;
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

        $request->user()->posts()->create($request->all() + ['image_path' => $file_new_name ?? 'default.jpg']);

        return back()->with('success', __('تم إضافة المنشور بنجاح، سيظهر بعد أن يوافق عليه المسؤول'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // $post = $this->post::find($id);
        $post = $this->post::where('slug', $slug)->first();
        $comments = $post->comments->sortByDesc('created_at');

        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = $this->post::find($id);

        abort_unless(auth()->user()->can('edit-post', $post) , 403); // to prevent the user from editing other posts through the url

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable',
        ]);

        $data['slug'] = Slug::uniqueSlug($request->title, 'posts'); // if the user change the title the slug will change too // Slug::uniqueSlug($request->title, 'posts') is a function in the Slug class in the helpers folders
        $data['category_id'] = $request->category_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_new_name = time() . $file->getClientOriginalName(); // save the image with time . original name
            $file->storeAs('public/images', $file_new_name);
        }

        $request->user()->posts()->where('slug', $slug)->update($data + ['image_path' => $file_new_name ?? 'default.jpg']);

        return redirect(route('post.show', $data['slug']))->with('success', __('تم تعديل المنشور بنجاح'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->post::find($id)->delete();

        return back()->with('success', __('تم حذف المنشور بنجاح'));
    }

    public function search(Request $request)
    {
        // search the column body '%' '%' trim the keyword(the name in the search field) form both sides
        $posts = $this->post::where('body', 'LIKE', '%' . $request->keyword . '%')->with('user')->approved()->paginate(10); // with('user') associated the user data with the post // approved using model scope in the post model scopeApproved() function name is Approved scope is to use model scope
        $title = __('نتائج البحث عن: ' . $request->keyword);

        return view('index', compact('posts', 'title'));
    }

    public function getByCategory($id)
    {
        // whereCategory_id where('category_id' , id)
        $posts = $this->post::with('user')->whereCategory_id($id)->approved()->paginate(10); // user is the relation user() in the post model to get the post user information
        $title = 'المنشورات العائدة للتصنيف: ' . Category::find($id)->title;

        return view('index', compact('posts', 'title'));
    }
}
