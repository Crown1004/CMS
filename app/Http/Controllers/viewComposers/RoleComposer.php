<?php

namespace App\Http\Controllers\viewComposers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleComposer extends Controller
{
    protected $roles;

    public  function __construct(Role $roles)
    {
        $this->roles = $roles;
    }

    public function compose(View $view) // executed automaticly
    {
        return $view->with('roles', $this->roles->all()); // send categories to the passed view partials.sidebar in the AppServiceProvider.php
    }
}
