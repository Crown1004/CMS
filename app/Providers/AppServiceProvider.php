<?php

namespace App\Providers;

use App\Http\Controllers\viewComposers\CategoryComposer;
use App\Http\Controllers\viewComposers\RoleComposer;
use App\Http\Controllers\viewComposers\CommentComposer;
use App\Http\Controllers\viewComposers\PageComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['partials.sidebar', 'lists.categories'], CategoryComposer::class); // to link the database with the view

        View::composer('lists.roles', RoleComposer::class);

        View::composer('partials.sidebar', CommentComposer::class);

        View::composer('partials.navbar', PageComposer::class);
    }
}
