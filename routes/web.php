<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AssignmentController;
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
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');

Route::get('/room/create', [RoomController::class, 'create'])->middleware('auth');
Route::get('/assignment/create', [AssignmentController::class, 'create'])->middleware('auth');
Route::get('/post/create', [PostController::class, 'create'])->middleware('auth');

Route::get('/room/store', [RoomController::class, 'store'])->middleware('auth');
Route::get('/assignment/store', [AssignmentController::class, 'store'])->middleware('auth');
Route::get('/post/store', [PostController::class, 'store'])->middleware('auth');
