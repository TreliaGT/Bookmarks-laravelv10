<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
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

Route::get('/dashboard', [BookmarkController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bookmark/create',[BookmarkController::class, 'create'])->name('bookmark.create');
    Route::post('/bookmark/create/new',[BookmarkController::class, 'store'])->name('bookmark.create.new');

    Route::get('/bookmark/{slug}', [BookmarkController::class, 'show'])->name('bookmark.show');
    Route::post('/bookmark/{id}/edit',[BookmarkController::class, 'update'])->name('bookmark.edit');
    Route::post('/bookmark/{id}/destroy',[BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::get('/bookmarks/search', [BookmarkController::class, 'search'])->name('bookmarks.search');


});

require __DIR__.'/auth.php';
