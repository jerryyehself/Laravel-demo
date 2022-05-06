<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactListController;
use App\Http\Controllers\ManagerController;

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


Auth::routes();

Route::prefix('/')->group(function ($request) {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::middleware('can:manager')->resource(
        '/staff',
        ManagerController::class
    );
    Route::resource('/contactlist', ContactListController::class);
});
