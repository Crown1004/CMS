<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\PostController as AdminPostController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [PostController::class, 'index']);
});

// Route::get('/', [PostController::class, 'index']);
Route::resource('/post', PostController::class);
Route::post('/search', [PostController::class, 'search'])->name('search');
Route::get('/category/{id}/{slug}', [PostController::class, 'getByCategory'])->name('category');

Route::resource('/comment', CommentController::class);
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');

Route::post('/notification', [NotificationController::class, 'index'])->name('notification');
Route::get('/notification', [NotificationController::class, 'allNotifications'])->name('all.notifications');

Route::get('/user/{id}', [UserController::class, 'getPostsByUser'])->name('profile');
Route::get('/user/{id}/comments', [UserController::class, 'getCommentsByUser'])->name('user.comments');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('/admin/category' , CategoryController::class);
Route::resource('/admin/posts' , AdminPostController::class);
Route::resource('/admin/role' , RoleController::class);
Route::get('/admin/permission' , [PermissionController::class, 'index'])->name('permissions'); // for showing permissions
Route::post('/admin/permission' , [PermissionController::class, 'store'])->name('permissions'); // for storing permissions
Route::resource('admin/user' , UserController::class);

Route::get('/permission/byRole' , [RoleController::class , 'getByRole'])->name('permission_byRole'); // receive role_id send from ajax in admin.permission.index
