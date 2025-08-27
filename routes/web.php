<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

// named parameter

// Route::get('/user/{id}',function($id){
//     return "user id"{$id};
// })->name('user.show');

//grouping
// Route::prefix('admin')->group(function (){
//     Route::get('/dashboard',function(){
//         return 'Admin settings';
//     });

//     Route::get('/settings',function(){
//         return 'Admin settings';
//     });
// });

// Route::get('/user/{id}',function ($id){
//     return "User with ID {$id}";
// })->where('id','[0-9]+');

// Route::get('/post/{slug}',function ($slug){
//     return "Post with slug {$slug}";

// })-> where('slug','[a-zA-Z0-9-]+');

//middleware

// Route::middleware(['auth'])->group(functiom (){
//     Route::get('/profile',function(){
//         return 'user proile';
//     })
//     Route::get('/settings',function(){
//         return 'user settings';
//     });
// });

// combine
Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/dashboard',function(){
        return 'Admin Dashboard';
    });

     Route::get('/settings',function(){
        return 'Admin Dashboard';
    });
});

//fallback
Route::fallback(function (){
    return view('errors.404');
});



// route::get('/posts', [App\Http\Controllers\PostController::class, 'index']);
// route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create']);
// route::post('/posts', [App\Http\Controllers\PostController::class, 'store']);
// route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show']);
// route::get('/posts/{id}/edit', [App\Http\Controllers\PostController::class, 'edit']);
// route::put('/posts/{id}', [App\Http\Controllers\PostController::class, 'update']);
// route::delete('/posts/{id}', [App\Http\Controllers\PostController::class, 'destroy']);

// no need to write 
Route::resource('/posts',PostController::class);  
Route::resource('/posts',PostController::class)->except(['destroy','update']);

// grpuping
// Using Route::controller method for grouping post controller routes
Route::controller(PostController::class)->group(function () {
    Route::get('/post', 'index')->name('post.index');
    Route::get('/post/create', 'create')->name('post.create');
    Route::post('/post', 'store')->name('post.store');
    Route::get('/post/{id}', 'show')->name('post.show');
    Route::get('/post/{id}/edit', 'edit')->name('post.edit');
    Route::put('/post/{id}', 'update')->name('post.update');
    Route::delete('/post/{id}', 'destroy')->name('post.destroy');
});