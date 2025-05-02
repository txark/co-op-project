<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
}); //call back f.

Route::get('/kku-login', function () {
    return view('kku_login');
});

Route::get('/admin-login', function () {
    return view('admin_login');
});