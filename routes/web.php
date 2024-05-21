<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
//
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
//
// require __DIR__.'/auth.php';
Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('/user',[\App\Http\Controllers\UserController::class,'list'])->middleware('admin')->name('user');
Route::post('signin',[\App\Http\Controllers\UserController::class,'singin'])->name('signin');
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout']);
Route::get('/set-session',[\App\Http\Controllers\SessionController::class,'setSession']);
Route::get('/get-session',[\App\Http\Controllers\SessionController::class,'getSession']);
Route::get('/del-session',[\App\Http\Controllers\SessionController::class,'delSession']);
Route::get('/session',[\App\Http\Controllers\SessionController::class,'viewSession'])->name('session');
Route::get('/product',[\App\Http\Controllers\ProductController::class,'list'])->name('product');
Route::get('/cart/{id}',[\App\Http\Controllers\ProductController::class,'card'])->name('cart');
Route::get('/list-cart',[\App\Http\Controllers\ProductController::class,'listCart'])->name('list.cart');
Route::get('sendmail', function (){
    \Illuminate\Support\Facades\Mail::to('vuthanhson041995@gmail.com')->send(new \App\Mail\Message());
});