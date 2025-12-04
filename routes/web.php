<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Livewire\Roles\Role;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Roles\RoleEdit;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\User;
use App\Livewire\Users\UserEdit;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->name('login');
Route::get('register',Register::class)->name('register');
Route::get('logout',[Dashboard::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function(){
    Route::get('dashboard',Dashboard::class)->name('dashboard');
    Route::get('users',User::class)->name('users');
    Route::prefix('users')->group(function(){
       Route::get('create',UserCreate::class)->name('create-user'); 
       Route::get('edit/{id}',UserEdit::class)->name('edit-user'); 
    });
    Route::get('roles',Role::class)->name('roles');
    Route::prefix('roles')->group(function(){
        Route::get('create',RoleCreate::class)->name('role.create');
        Route::get('edit/{id}',RoleEdit::class)->name('role.edit');
    });
    
});
