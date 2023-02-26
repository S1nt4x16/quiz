<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SubjectsController;

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

Route::prefix('teachers')->group(function () {
    Route::get('/', [TeachersController::class, 'index'])->name('teachers_master');
    Route::get('/create', [TeachersController::class, 'create']);
    Route::post('/store', [TeachersController::class, 'store']);
    Route::get('/edit/{id}', [TeachersController::class, 'edit']);
    Route::post('/update', [TeachersController::class, 'update']);
    Route::delete('/delete/{id}', [TeachersController::class, 'delete']);
});

Route::prefix('subjects')->group(function () {
    Route::get('/', [SubjectsController::class, 'index'])->name('subjects_master');
    Route::get('/create', [SubjectsController::class, 'create']);
    Route::post('/store', [SubjectsController::class, 'store']);
    Route::get('/edit/{id}', [SubjectsController::class, 'edit']);
    Route::post('/update', [SubjectsController::class, 'update']);
    Route::delete('/delete/{id}', [SubjectsController::class, 'delete']);
});
