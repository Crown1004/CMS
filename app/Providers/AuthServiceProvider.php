<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::define('delete-post', function($user, $post) {
        //     return $user->isAllowedTo('delete-post') && ($user->id == $post->user_id || $user->isAdmin());
        // });

        // Gate::define('edit-post', function($user, $post) {
        //     return $user->isAllowedTo('edit-post') && ($user->id == $post->user_id || $user->isAdmin());
        // });

        // // ::get(['name']) get all the values in the column name in the permissions table , ->map() loop on the values and send each value to the function
        // Permission::get(['name'])->map(function ($permission) { // loop on the permissions table and get the name of each permission and send it to isAllowedTo()
        //     Gate::define($permission->name, function ($user, $post) use ($permission) { // $user is send automatically by laravel , $post is send in the @can directive
        //         return $user->isAllowedTo($permission->name) && ($user->id == $post->user_id || $user->isAdmin());
        //     });
        // });

        // receive the ($user, $post) in the parameter if the permissions is on a post
        // ::whereIn(['name']) get these values in the column name in the permissions table , ->map() loop on the values and send each value to the function
        Permission::whereIn('name', ['edit-post', 'delete-post', 'add-post'])->get()->map(function ($permission) { // loop on the permissions table and get the name of each permission and send it to isAllowedTo()
            Gate::define($permission->name, function ($user, $post) use ($permission) { // $user is send automatically by laravel , $post is send in the @can directive
                return $user->isAllowedTo($permission->name) && ($user->id == $post->user_id || $user->isAdmin());
            });
        });

        // receive the ($user) only in the parameter if the permissions is on a user
        // ::whereIn(['name']) get these values in the column name in the permissions table , ->map() loop on the values and send each value to the function
        Permission::whereIn('name', ['edit-user', 'delete-user', 'add-user'])->get()->map(function ($permission) { // loop on the permissions table and get the name of each permission and send it to isAllowedTo()
            Gate::define($permission->name, function ($user) use ($permission) { // $user is send automatically by laravel , $post is send in the @can directive
                return $user->isAllowedTo($permission->name) && $user->isAdmin();
            });
        });
    }
}
