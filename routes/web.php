<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\LettersController;
use App\Models\LetterTypes;

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
    return view('home');
})->name('home');

Route::middleware('IsGuest')->group (function(){
    // ketika akses link  pertama kali yang dimuncilin halaman login
        Route::get('/', function () {
            return view('login');
        })->name('login');
        Route::post('/login', [UserController::class, 'authLogin'])->name('auth-login');
    });

        Route::middleware('IsLogin')->group(function() {
            Route::get('/logout', [UserController::class, 'logout'])->name('auth-logout');

        Route::get('/home', function () {
            return view('home');
                });
        Route::middleware('IsAdmin')->group(function(){
        });
    });


    Route::prefix('/user')->name('user.')->group(function(){
    Route::prefix('/staff')->name('staff.')->group(function() {
        Route::get('/', [UserController::class, 'staff'])->name('home');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/id}', [UserController::class, 'edit'])->name('edit');
        Route::get('/{id}',  [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');

    });
        Route::prefix('/guru')->name('guru.')->group(function() {
        Route::get('/', [GuruController::class, 'guru'])->name('home');
        Route::get('/create', [GuruController::class, 'create'])->name('create');
        Route::post('/store', [GuruController::class, 'store'])->name('store');
        Route::get('/{id}', [GuruController::class, 'edit'])->name('edit');
        Route::delete('/{id}', [GuruController::class, 'delete'])->name('delete');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
});


 });

 Route::prefix('/data')->name('data.')->group(function(){
    Route::prefix('/klasifikasi')->name('klasifikasi.')->group(function(){
        Route::get('/', [LetterTypeController::class, 'index'])->name('home');
        Route::get('/create', [LetterTypeController::class, 'create'])->name('create');
        Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
        Route::get('/{id}', [LetterTypeController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [LetterTypeController::class, 'update'])->name('update');
        Route::delete('/{id}', [LetterTypeController::class, 'destroy'])->name('delete');
        Route::get('/show/{id}', [LetterTypeController::class, 'show'])->name('show');

    });

    Route::prefix('/datasurat')->name('datasurat.')->group(function() {
        Route::get('/', [LettersController::class, 'index'])->name('home');
        Route::get('/create', [LettersController::class, 'create'])->name('create');
        Route::post('/store', [LettersController::class, 'store'])->name('store');
        Route::get('/{id}', [LettersController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [LettersController::class, 'update'])->name('update');
        Route::delete('/{id}', [LettersController::class, 'destroy'])->name('delete');
});

 });







    // Route::get('/create', [UserController::class, 'create'])->name('create');
    // Route::post('/store', [UserController::class, 'store'])->name('store');
    // Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    // Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    // Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete'


// Route::prefix('/data')->name('data.')->group(function(){
//     Route::prefix('/klasifikasi')->name('klasif.')->group(function(){
//         Route::get('/', [LetterTypeController::class, 'index'])->name('home');
//     });

//     Route::prefix('/datasurat')->name('datasurat.')->group(function() {
//         Route::get('/', [LettersController::class, 'index'])->name('home');
//     });

// })
