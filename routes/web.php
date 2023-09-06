<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PositionController;
use App\Livewire\Main\PositionComponent;
use App\Livewire\Main\ProfileComponent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('sign_in');
// });

Route::get('/', [LoginController::class, 'guest'])->name('guestLogin');
Route::get('/signup/show', [LoginController::class, 'signup'])->name('startSignup');
Route::get('/position', PositionComponent::class)->name('position');
Route::get('/profile', ProfileComponent::class)->name('profile');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'loginStart'])->name('loginStart');
Route::post('/signup/store', [LoginController::class, 'storeUser'])->name('storeUser');
Route::post('/profile/store', [PositionController::class, 'storePosition'])->name('storePosition');
