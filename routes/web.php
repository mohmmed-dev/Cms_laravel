<?php

use App\Http\Controllers\admin\DashController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\PostController as Posts;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class,'index'])->name('home');
Route::resource('/post', PostController::class);
Route::view('/tt', 'tray');
Route::get('/search', [PostController::class,'search'])->name('search');
Route::get('/category/{category}/', [PostController::class,'getByCategory'])->name('category');
Route::resource('/comment', CommentController::class);
Route::post('/reply/store', [CommentController::class,'replyStore'])->name('reply.add');
Route::get('/notification', [NotificationController::class,'allNotification'])->name('all.notification');
Route::get('/user/{user}', [UserController::class,'getPostsByUser'])->name('profile.show.user');
Route::get('/user/{user}/comments', [UserController::class,'getCommentsByUser'])->name('user.comments');
Route::redirect('/dashboard','/');

Route::group(['prefix' => 'admin','middleware' => 'isAdmin'],function(){
    Route::get('/dashboard',[DashController::class,'index'])->name('admin');
    // Route::resources([

    // ]);
    Route::resource('/category',CategoryController::class);
    Route::resource('/posts',Posts::class);
    Route::resource('/roles',RoleController::class);
    Route::resource('/users',UserController::class);
    Route::resource('/pages',PageController::class);
    Route::get('admin/permission',[PermissionController::class,'index'])->name('permissions');
    Route::post('admin/permission',[PermissionController::class,'store'])->name('permissions');
});

    Route::get('/pages/{page}',[PageController::class,'show'])->name('pages.show');






// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

require_once __DIR__ . '/fortify.php';
