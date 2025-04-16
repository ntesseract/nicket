<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/register', [EventController::class, 'register'])->name('events.register');
Route::post('/events/{event}/register', [EventController::class, 'storeRegistration'])->name('events.storeRegistration');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/events/{event}/image/edit', [App\Http\Controllers\EventImageController::class, 'edit'])->name('event.image.edit');
Route::put('/events/{event}/image', [App\Http\Controllers\EventImageController::class, 'update'])->name('event.image.update');
Route::delete('/events/{event}/image', [App\Http\Controllers\EventImageController::class, 'destroy'])->name('event.image.destroy');