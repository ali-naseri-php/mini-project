<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (\App\service\selectArticleService $service) {
//    dd($service->select()->all());
    return view('welcome',['articles'=>$service->select()->all()]);
});

Route::get('/register', function () {
    return view('auth.register');
})->name('form.register');

Route::get('/login', function () {
    return view('auth.login');
})->name('form.login');

Route::post('/login', [\App\Http\Controllers\auth\loginController::class,'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\auth\loginController::class,'logout'])->name('logout');
Route::post('/register', [\App\Http\Controllers\auth\loginController::class,'register'])->name('register');

