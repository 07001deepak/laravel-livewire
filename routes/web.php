<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Livewire\Users\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->name('login');
Route::get('register',Register::class)->name('register');
Route::get('logout',[Dashboard::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function(){
    Route::get('dashboard',Dashboard::class)->name('dashboard');
    Route::get('users',User::class)->name('users');
});
