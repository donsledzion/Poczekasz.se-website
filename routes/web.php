<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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
    return view('welcome.default');
});

Route::redirect('/welcome', '/');

Route::group(['prefix' => 'wroclaw'], function () {
    Route::redirect('/', '/welcome', 301);
    Route::get('/welcome', function () {
        return view('welcome.wroclaw');
    });
});

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
    /*Route::get('/welcome', function () {

    }); */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);

require __DIR__.'/auth.php';
