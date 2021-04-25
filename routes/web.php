<?php

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

Auth::routes(['reset' => false]);

Route::group(['middleware' => ['auth', 'datafilter']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('buttons')->group(function () {
        Route::get('/', [App\Http\Controllers\ButtonsController::class, 'list'])->name('buttons');
        Route::get('/{index}/edit', [App\Http\Controllers\ButtonsController::class, 'editView'])->name('buttons.editView');
        Route::post('/{index}', [App\Http\Controllers\ButtonsController::class, 'edit'])->name('buttons.edit');
    });
});
