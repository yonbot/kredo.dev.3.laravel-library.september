<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'author', 'as' => 'author.'], function () {
        Route::get('/', [AuthorController::class, 'index'])->name('index');
        Route::post('/store', [AuthorController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [AuthorController::class, 'update'])->name('update');
        Route::get('/{id}/delete', [AuthorController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [AuthorController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'book', 'as' => 'book.'], function () {
        Route::get('/', [BookController::class, 'index'])->name('index');
        Route::post('/store', [BookController::class, 'store'])->name('store');
        Route::get('/{id}/show', [BookController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [BookController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [BookController::class, 'update'])->name('update');
        Route::get('/{id}/delete', [BookController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [BookController::class, 'destroy'])->name('destroy');
    });
});
