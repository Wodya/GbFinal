<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/register1', function () {
    return view('auth.register1');
});
Route::get('/register2', function () {
    return view('auth.register2');
});
Route::get('/search_step1', function () {
    return view('search_step1');
});

Route::get('/', function () {
    return view('index');
})->middleware(['auth'])->name('dashboard');;

Route::get('/dashboard', function () {
    return view('dashboard');
});
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('/main', function () {
    return view('main');
})->middleware(['auth'])->name('main');

require __DIR__.'/auth.php';
