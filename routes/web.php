<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SubmissionController;
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
Route::get('/submission/create/{assignment_id}', [SubmissionController::class, 'create'])->middleware('auth');

Route::post('/room/store/{teacher_id}', [RoomController::class, 'store'])->middleware('auth');
Route::post('/assignment/store/{room_id}', [AssignmentController::class, 'store'])->middleware('auth');
Route::post('/post/store/{room_id}', [PostController::class, 'store'])->middleware('auth');
Route::post('/submission/store/{assignment_id}', [SubmissionController::class, 'store'])->middleware('auth');

Route::get('/room/{id}', [RoomController::class, 'enter'])->middleware('auth');
Route::get('/posts/view/{room_id}', [PostController::class, 'view'])->middleware('auth');

Route::get('/assignments/view/{room_id}', [AssignmentController::class, 'view'])->middleware('auth');
Route::get('/assignments/view/my-score/{room_id}', [SubmissionController::class, 'myscore'])->middleware('auth');
Route::get('/check/{assignment_id}', [SubmissionController::class, 'check'])->middleware('auth');

Route::get('/join/{id}', [UserController::class, 'join'])->middleware('auth');
Route::post('/join/verify/{student_id}', [RoomController::class, 'verify'])->middleware('auth');
Route::post('/score/store/{id}', [SubmissionController::class, 'score_store'])->middleware('auth');
Route::post('/answer/store/{id}', [SubmissionController::class, 'store'])->middleware('auth');


Route::get('/answer/{id}', [SubmissionController::class, 'answer'])->middleware('auth');
Route::get('/give-score/{id}', [SubmissionController::class, 'giveScore'])->middleware('auth');

Route::get('/view/teachers', [UserController::class, 'view_teachers'])->middleware('auth');
Route::get('/view/courses', [RoomController::class, 'view_courses'])->middleware('auth');
Route::get('/view/students', [UserController::class, 'view_students'])->middleware('auth');

Route::get('/delete/teacher/{id}', [UserController::class, 'delete_teacher'])->middleware('auth');
Route::get('/delete/course/{id}' ,[RoomController::class, 'delete_course'])->middleware('auth');
Route::get('/delete/student/{id}', [UserController::class, 'delete_student'])->middleware('auth');