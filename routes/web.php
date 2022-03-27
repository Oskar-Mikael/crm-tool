<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'customers'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');    
    Route::get('{customer}', [CustomerController::class, 'show'])->name('customers.show');    
});

Route::group(['prefix' => 'company'], function () {
    Route::get('/', [CompanyController::class, 'index'])->name('company.index');
}); 
