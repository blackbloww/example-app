<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::post('/store', [UsersController::class, 'store'])->name('users.store');
    Route::put('/update', [UsersController::class, 'update'])->name('users.update');
});
