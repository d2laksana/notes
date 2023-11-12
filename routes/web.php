<?php

use App\Http\Controllers\NotesController;
use App\Http\Controllers\UsersController;
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

Route::get('/login', [UsersController::class, 'loginPage']);
Route::get('/register', [UsersController::class, 'register']);
Route::post('/newUser', [UsersController::class, 'create']);
Route::post('/auth', [UsersController::class, 'auth']);
Route::get('/logout', [UsersController::class, 'logout']);

Route::middleware(['cekLogin'])->group(function () {
    Route::get('/', [NotesController::class, 'index']);
    Route::post('store', [NotesController::class, 'store']);
    Route::get('/{id}', [NotesController::class, 'detail']);
    Route::put('/{id}', [NotesController::class, 'edit']);
    Route::delete('/{id}', [NotesController::class, 'destroy']);
});
