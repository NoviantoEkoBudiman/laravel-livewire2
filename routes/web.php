<?php

use App\Livewire\Dashboard;
use App\Livewire\Hotels\HotelList;
use App\Livewire\Login;
use App\Livewire\Logout;
use Illuminate\Support\Facades\Route;

Route::get("/",Dashboard::class);
// Route::get("/dashboard",Dashboard::class)->middleware('user');
// Route::middleware(['web', 'user'])->group(function () {
    Route::get('/dashboard', Dashboard::class);
// });

Route::get("/hotels",HotelList::class);
Route::get("/login",Login::class);
Route::get("/logout",Logout::class);