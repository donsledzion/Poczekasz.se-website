<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users', function () {
    return view('users.list', ['users' => User::all(), 'header'=>'Userzy']);
})->middleware(['auth'])->name('users');

Route::get('/users/show/{id}', function ($id) {
    return view('users.show', ['user' => User::find($id), 'header'=>'Prezentacja Usera']);
})->middleware(['auth'])->name('users/show');

Route::get('/users/edit/{id}', function ($id) {
    return view('users.edit', ['user' => User::find($id), 'header'=>'Edycja Usera']);
})->middleware(['auth'])->name('users/edit');

Route::get('/users/delete/{id}', function ($id) {
    return view('users.delete', ['user' => User::find($id), 'header'=>'Usunięcie Usera']);
})->middleware(['auth'])->name('users/delete');

require __DIR__.'/auth.php';
