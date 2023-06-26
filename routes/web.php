<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EditController;
use App\Models\SignUser;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('top_page');
});
Route::get('/sign_up', function () {
    return view('sign_up');
});
Route::get('/list', [SearchController::class, 'index'])->name('users.search');

Route::get('/detail', function () {
    return view('detail');
});
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users',  [UsersController::class, 'index'])->name('users.index');

Route::get('/users/search', [SearchController::class, 'search'])->name('users.search');

Route::get('/users/{id}', function ($id) {
    $post = SignUser::findOrFail($id);
    return view('detail', ['user' => $post]);
  })->name('users.show');

Route::get('/edit/{id}', [EditController::class, 'edit'])->name('edit');

Route::post('/update/{id}', [EditController::class, 'update'])->name('update');

Route::get('/new_success', function () {
    return view('new_success');
});