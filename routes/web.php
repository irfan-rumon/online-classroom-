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
Route::get('/assignment/create/{room_id}', [AssignmentController::class, 'create'])->middleware('auth');
Route::get('/post/create/{room_id}', [PostController::class, 'create'])->middleware('auth');

Route::post('/room/store/{teacher_id}', [RoomController::class, 'store'])->middleware('auth');
Route::post('/assignment/store/{room_id}', [AssignmentController::class, 'store'])->middleware('auth');
Route::post('/post/store/{room_id}', [PostController::class, 'store'])->middleware('auth');
