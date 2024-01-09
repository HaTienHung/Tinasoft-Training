<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassUserController;
use App\Http\Controllers\Controller;
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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('User.register');
})->name('register_form');
Route::get('/login', function () {
    return view('User.login');
})->name('login_form');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    //User
    Route::get('/all/{role_name}', [AuthController::class, 'getAllUsers'])->middleware('checkRole')->name('users_list');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/add', function () {
        return view('User.createUser');
    })->middleware('checkRole')->name('add_user');
    Route::post('/add', [AuthController::class, 'createUser'])->middleware('checkRole')->name('add_user');
    Route::get('/edit/{user}', [AuthController::class, 'editView'])->middleware('checkRole')->name('edit_user');
    Route::put('/edit/{id}', [AuthController::class, 'editUserByID'])->middleware('checkRole')->name('update_user');
    Route::delete('/delete/{id}', [AuthController::class, 'destroyUserByID'])->middleware('checkRole')->name('delete_user');

    //Class
    Route::get('/class', [ClassController::class, 'getAll'])->name('class_list');
    Route::delete('/delete/class/{id}', [ClassController::class, 'destroyClassByID'])->middleware('checkRole')->name('delete_class');

    //Class User
    Route::get('/class/info/{id}', [ClassController::class, 'getClassInfo'])->name('class_info');
    Route::get('/add/class-user', [ClassUserController::class, 'index'])->middleware('checkRole')->name('addClassUserForm');
    Route::post('/addClassUser', [ClassUserController::class, 'create'])->name('create_class_user');
    Route::delete('/remove-user/{user_id}/{class_id}', [ClassUserController::class, 'removeClassUser'])->name('delete_class_user');
});
