<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecipeController;

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

/* Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [TopController::class, 'index']);
Route::get('/recipe/list', [RecipeController::class,'list'])->name('list');
Route::get('/recipe/detail/{id}', [RecipeController::class,'detail']);

Auth::routes([
    'reset' => false, // パスワードリセット用のルート。デフォルトは true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// /admin/へのアクセスを認証済みユーザのみに限定する
Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/input', [AdminController::class,'input']);
    Route::post('/admin/store', [AdminController::class,'store']);
    Route::get('/admin/edit/{id}', [AdminController::class,'edit']);
    Route::post('/admin/delete', [AdminController::class,'delete']);
    Route::post('/admin/update', [AdminController::class,'update']);
});
