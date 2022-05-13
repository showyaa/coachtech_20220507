<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/contact', [ContactController::class, 'index'])->name('index');
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'send']);

Route::get('/management', [ManagementController::class, 'find']);
Route::get('/result', [ManagementController::class, 'search']);

Route::post('/delete', [ManagementController::class, 'delete']);

Route::get('/', function () {
    return view('welcome');
});
