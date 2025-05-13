<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CompanyController;

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
})->name('comp.login');

Route::get('/comp-regis', [CompanyController::class, 'regisForm'])->name('comp.register');
Route::post('/comp-regis', [CompanyController::class, 'registerList'])->name('comp.regis.list');