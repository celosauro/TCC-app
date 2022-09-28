<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('news', NewsController::class);

    Route::resource('activities', ActivitiesController::class)
        ->parameters(['activities' => 'activities']);

});

require __DIR__.'/auth.php';
