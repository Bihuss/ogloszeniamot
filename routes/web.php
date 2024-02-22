<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoryController;


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


Route::get('/',  [\App\Http\Controllers\ItemsController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['prefix' => 'admin',  'middleware' => ['role:admin'], 'as' => 'admin.'], function()
{
    Route::get('/', [\App\Http\Controllers\Admin\ItemsController::class,'index'])->name('index');
    Route::resource('items', \App\Http\Controllers\Admin\ItemsController::class)->names('items');
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->names('category');

    Route::resource('users', \App\Http\Controllers\Admin\UsersController::class)->only('index','edit','update','destroy');
});



Route::group(['middleware' => ['auth','verified']], function() {
//    Route::resource('user', 'User\UsersController');

    Route::resource('item', ItemsController::class)->names('item')->except(['index','filter']);
});

Route::resource('item', ItemsController::class)->names('item')->only(['show']);

Route::get('items/filter', [ItemsController::class,'filter'])->name('items.filter');
Route::get('items', [ItemsController::class,'index'])->name('items.index');
Route::post('items', [ItemsController::class,'index']);

Route::resource('category',CategoryController::class)->names('category')->except(['show']);
Route::get('category/{id}', [CategoryController::class,'show'])->name('category.show');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
