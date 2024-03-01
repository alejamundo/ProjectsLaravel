<?php

use App\Http\Controllers\taskController;
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

Route::group(['middleware' => ['web']], function () {
    Route::get('/',  [TaskController::class, 'index'])->name('index');
    Route::post('/store',  [TaskController::class, 'store'])->name('task.store');
    Route::get('{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('update/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('delete/{id}', [TaskController::class, 'delete'])->name('task.delete');

});
