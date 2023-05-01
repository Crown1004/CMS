<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\PostController as AdminPostController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
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



Route::get('/', [PostController::class, 'index']);
Route::resource('/post', PostController::class);
Route::post('/search', [PostController::class, 'search'])->name('search');
Route::get('/category/{id}/{slug}', [PostController::class, 'getByCategory'])->name('category');

Route::resource('/comment', CommentController::class);
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');

Route::post('/notification', [NotificationController::class, 'index'])->name('notification');
Route::get('/notification', [NotificationController::class, 'allNotifications'])->name('all.notifications');

Route::get('/user/{id}', [UserController::class, 'getPostsByUser'])->name('profile');
Route::get('/user/{id}/comments', [UserController::class, 'getCommentsByUser'])->name('user.comments');

Route::group(['prefix' => 'admin', 'middleware' => 'Admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/category', CategoryController::class);
    Route::resource('/posts', AdminPostController::class);
    Route::resource('/role', RoleController::class);
    Route::get('/permission', [PermissionController::class, 'index'])->name('permissions'); // for showing permissions
    Route::post('/permission', [PermissionController::class, 'store'])->name('permissions'); // for storing permissions
    Route::resource('/user', UserController::class);
    Route::resource('/page', PageController::class);
});

Route::get('/permission/byRole', [RoleController::class, 'getByRole'])->name('permission_byRole')->middleware('Admin'); // receive role_id send from ajax in admin.permission.index

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
