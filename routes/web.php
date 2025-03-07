<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\AuthController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

// Route Dashboard Admin
Route::prefix('Admin')->middleware('auth')->group(function () {
Route::get('/', [DashboardController::class, 'index'])->name('Admin_Layouts.dashboard');


Route::get('hero', [HeroSectionController::class, 'index'])->name('Admin.HeroSection.index');
Route::get('hero/create', [HeroSectionController::class, 'create'])->name('Admin.HeroSection.create');
Route::post('hero', [HeroSectionController::class, 'store'])->name('Admin.HeroSection.store');
Route::get('hero/{heroSection}/edit', [HeroSectionController::class, 'edit'])->name('Admin.HeroSection.edit');
Route::post('hero/{heroSection}', [HeroSectionController::class, 'update'])->name('Admin.HeroSection.update');
Route::delete('hero/{heroSection}', [HeroSectionController::class, 'destroy'])->name('Admin.HeroSection.destroy');
});

