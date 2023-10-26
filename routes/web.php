<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

    return view('post');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/chat', [FileController::class, 'index'])->name('chat');
Route::get('/messages', [FileController::class, 'message'])->name('messages');
Route::post('/messages', [FileController::class, 'messageStore'])->name('messages');


Route::get('/post', [PostController::class, 'index'])->name('post');
Route::post('/post-like',[PostController::class, 'postLike'])->name('post-like');

Route::get('/products',[ProductController::class, 'create'])->name('products')->middleware('admin');
Route::get('/products/page',[ProductController::class, 'index'])->name('index');
Route::post('/product/store',[ProductController::class, 'store'])->name('products-store');
Route::get('/product/{id}/edit',[ProductController::class, 'edit'])->name('edit');
Route::put('/product/{id}/update',[ProductController::class, 'update'])->name('update');
Route::get('/product/{id}/delete',[ProductController::class, 'destroy'])->name('delete');



require __DIR__.'/auth.php';
