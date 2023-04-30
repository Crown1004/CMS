<?php

namespace App\Http\Controllers\viewComposers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\View\View;

class PageComposer extends Controller
{
    protected $page;

    public  function __construct(Page $pages)
    {
        $this->page = $pages;
    }

    public function compose(View $view) // executed automaticly
    {
        return $view->with('pages' , $this->page::all());
    }
}
