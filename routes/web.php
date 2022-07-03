<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TaskController;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/setup', function () {
        return view('setup.index');
    })->middleware('setup');

    Route::middleware('company')->group(function () {
        Route::resource('company', CompanyController::class, ['only' => ['index'], 'names' => 'company']);
        Route::get('company/settings', [CompanyController::class, 'settings'])->name('company.settings');
        Route::get('/', [CompanyController::class, 'index'])
            ->name('index');
        Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::resource('customers', CustomerController::class, ['only' => ['index', 'show'], 'names' => 'customers', 'parameters' => 'id']);
        Route::resource('tasks', TaskController::class, ['only' => ['index', 'show', 'create', 'store'], 'names' => 'task', 'parameters' => 'id']);
        Route::put('tasks/changeStatus/{task}', [TaskController::class, 'changeStatus'])->name('task.changeStatus');
    });
});
