<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia('Home');
});

Route::get('/pacientes', function () {
    return Inertia('Pacientes');
});

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
