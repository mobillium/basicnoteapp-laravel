<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserNotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("auth/login", [AuthController::class, 'login']);
Route::post("auth/register", [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function () {

    // User
    Route::get('users/me', [UserController::class, 'show']);
    Route::put('users/me', [UserController::class, 'update']);
    Route::get('users/me/notes', [UserNotesController::class, 'index']);

    // Note
    Route::resource('notes', NoteController::class, ['store', 'show', 'update', 'destroy']);

});
