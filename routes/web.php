<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/signin', [SignInController::class, 'index'])->name('login');
Route::post('/signin', [SignInController::class, 'store']);

Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::post('/signup', [SignUpController::class, 'store']);

Route::post('/signout', [SignOutController::class, 'index'])->name('signout');

Route::get('/review/add', [ReviewController::class, 'index'])->name('review.add');
Route::post('/review/add', [ReviewController::class, 'store']);

Route::get('/review/list', [ReviewController::class, 'all'])->name('review.list');

Route::get('/user/{review}', [ReviewController::class, 'review'])->name('user.review');