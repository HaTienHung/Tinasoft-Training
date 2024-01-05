<?php

use App\Http\Controllers\AuthController;
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

//API Login , Register
Route::post('/register', [AuthController::class, 'register'])->name('auth_register');
Route::post('/login', [AuthController::class, 'login'])->name('auth_login');

Route::get('/register', [AuthController::class, 'register_form'])->name('register_form');
Route::get('/login', [AuthController::class, 'login_form'])->name('login_form');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/all/{role_name}', [AuthController::class, 'getAllUsers'])->middleware('checkRole')->name('users_list');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/add', [AuthController::class, 'addUser'])->middleware('checkRole')->name('add_user');
    Route::get('/add', function () {
        return view('/createUser');
    })->middleware('checkRole')->name('add_user');
    Route::post('/add', [AuthController::class, 'createUser'])->middleware('checkRole')->name('add_user');
    Route::get('/edit/{user}', [AuthController::class, 'editView'])->middleware('checkRole')->name('edit_user');
    Route::put('/edit/{id}', [AuthController::class, 'editUserByID'])->middleware('checkRole')->name('update_user');
    Route::delete('/delete/{id}', [AuthController::class, 'destroyUserByID'])->middleware('checkRole')->name('delete_user');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
