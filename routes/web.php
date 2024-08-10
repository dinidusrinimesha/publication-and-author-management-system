<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/publication-register', [PublicationController::class, 'registerPublication'])->name('publication-register');
Route::post('/publication-register/store', [PublicationController::class, 'store'])->name('publication.store');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/author', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/author/index', [AuthorController::class, 'index'])->name('author.all');
    Route::get('/author/{id}/view', [AuthorController::class, 'view'])->name('author.view');
    Route::get('/author/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('/author/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::delete('/author/{id}', [AuthorController::class, 'destroy'])->name('author.delete');
    Route::get('/author/{id}/toggle-status', [AuthorController::class, 'toggleActiveUser'])->name('author.toggle-status');
    Route::get('/author/{id}/inactive', [AuthorController::class, 'inactiveUser'])->name('author.inactive');

    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.all');
    
    Route::get('/publication/{id}/view', [PublicationController::class, 'view'])->name('publication.view');
});
