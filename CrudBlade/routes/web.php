<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/store', [UserController::class, 'store'])->name('user.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    // Otras rutas que requieran autenticación
});




//Route::get('/task',[TaskController::class],'index')->name('task.index');
//Route::get('/task/create',[TaskController::class],'store')->name('task.store');
