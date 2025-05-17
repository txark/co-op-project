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
Route::get('/comp-login', [CompanyController::class, 'loginForm'])->name('comp.login.form');
Route::post('/comp-login', [CompanyController::class, 'loginComp'])->name('comp.login');

Route::get('/comp-regis', [CompanyController::class, 'regisForm'])->name('comp.register');
Route::post('/comp-regis', [CompanyController::class, 'registerList'])->name('comp.regis.list');