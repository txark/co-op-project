<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return view('index');
})->name('index.page'); //call back f.

// Student Zone
Route::get('/kku-login', function () {
    return view('kku_login');
});

// Admin Zone
Route::get('/admin-login', [AdminAuthController::class, 'loginForm'])->name('admin.login.form');
Route::post('/admin-login', [AdminAuthController::class, 'login'])->name('admin.login');

// Company Zone
Route::get('/comp-login', function () {
    return view('comp_login');
});

Route::get('/comp-regis', function () {
    return view('comp_regis');
});