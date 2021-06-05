<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
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


//Routes for wroclaw module
Route::group(['prefix' => 'wroclaw'], function () {
    Route::redirect('/', '/welcome', 301);
    Route::get('/welcome', function () {
        return view('welcome.wroclaw');
    });
});
//Routes for plk module
Route::group(['prefix' => 'plk'], function () {
        Route::redirect('/', '/underconstruction', 301);
        Route::get('/underconstruction', function () {
            return view('maintenance.underconstruction');
        });
        /*Route::redirect('/', '/welcome', 301);
        Route::get('/welcome', function () {
            return view('welcome.plk');
        });*/
    });
//No module routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/', function () {
    return view('welcome.default');
});

Route::redirect('/welcome', '/');
Route::resource('users', UserController::class);

require __DIR__.'/auth.php';
