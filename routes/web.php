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

Route::get('/comp-login', function () {
    return view('comp_login');
});

Route::get('/comp-regis', function () {
    return view('comp_regis');
});