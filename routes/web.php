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


//Accessed by Admin
Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/view/teachers', [UserController::class, 'view_teachers']);
    Route::get('/view/courses', [RoomController::class, 'view_courses']);
    Route::get('/view/students', [UserController::class, 'view_students']);
    Route::get('/delete/teacher/{id}', [UserController::class, 'delete_teacher']);
    Route::get('/delete/course/{id}' ,[RoomController::class, 'delete_course']);
    Route::get('/delete/student/{id}', [UserController::class, 'delete_student']);
});

//Accessed by Teacher
Route::middleware(['auth', 'isTeacher'])->group(function(){
    Route::get('/room/create', [RoomController::class, 'create']);
    Route::get('/assignment/create/{room_id}', [AssignmentController::class, 'create']);
    Route::get('/post/create/{room_id}', [PostController::class, 'create']);
    Route::get('/give-score/{id}', [SubmissionController::class, 'giveScore']);
    Route::get('/check/{assignment_id}', [SubmissionController::class, 'check']);
    Route::post('/room/store/{teacher_id}', [RoomController::class, 'store']);
    Route::post('/assignment/store/{room_id}', [AssignmentController::class, 'store']);
    Route::post('/post/store/{room_id}', [PostController::class, 'store']);
    Route::post('/score/store/{id}', [SubmissionController::class, 'score_store']);
});

//Accessed by Student
Route::middleware(['auth', 'isStudent'])->group(function(){
    Route::get('/submission/create/{assignment_id}', [SubmissionController::class, 'create']);
    Route::post('/submission/store/{assignment_id}', [SubmissionController::class, 'store']);
    Route::get('/join/{id}', [UserController::class, 'join']);
    Route::post('/join/verify/{student_id}', [RoomController::class, 'verify']);
    Route::get('/assignments/view/my-score/{room_id}', [SubmissionController::class, 'myscore']);
    Route::post('/answer/store/{id}', [SubmissionController::class, 'store']);
    Route::get('/answer/{id}', [SubmissionController::class, 'answer']);
});

//Accessed by Authenticated user
Route::middleware(['auth', 'isUser'])->group(function(){
    Route::get('/posts/view/{room_id}', [PostController::class, 'view']);
    Route::get('/assignments/view/{room_id}', [AssignmentController::class, 'view']);
    Route::get('/room/{id}', [RoomController::class, 'enter']);
});