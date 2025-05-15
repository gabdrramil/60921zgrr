<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThreadController;
use Illuminate\Http\Request;

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
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});
//Route::get('/thread/{id}', [\App\Http\Controllers\ThreadController::class, 'show']);
Route::get('/threads', [ThreadController::class, 'index']);
Route::get('/user', [UserController::class, 'index'])->name('user');

Route::get('/user/create', [UserController::class, 'create'])->middleware('auth');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('auth');;


Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'store']);

Route::post('/user/update/{id}', [UserController::class, 'update'])->middleware('auth');;
Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])
    ->middleware('auth')
    ->name('user.destroy');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/authenticate', [LoginController::class, 'authenticate']);

Route::get('/error', function () {
    return view('error',['message' => session('message')]);
});


