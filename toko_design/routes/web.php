<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.home');
});

Route::get('/about', function () {
    return view('admin.about');
});
