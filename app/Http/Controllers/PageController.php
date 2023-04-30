<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = $this->page->all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
        ]);

        $this->page->create($request->all());

        return redirect()->route('page.index')->with('success', __('تم إضافة الصفحة بنجاح'));
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $page = $this->page->whereSlug($slug)->first(); // whereSlug is equal to where('slug', $slug)

        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page = $this->page->find($id);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->page->find($id)->update($request->all());

        return redirect()->route('page.index')->with('success', __('تم تعديل الصفحة بنجاح'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->page->find($id)->delete();

        return redirect()->route('page.index')->with('success', __('تم حذف الصفحة بنجاح'));
    }
}
