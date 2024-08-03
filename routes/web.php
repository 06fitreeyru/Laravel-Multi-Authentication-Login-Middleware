<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Employee\EmployeeDashboardController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' , [LoginController::class,'index']);
Route::post('/login' , [LoginController::class,'login'])->name('login');
Route::post('/logout' , [LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => 'check.role:admin'], function () {
    Route::get('/admin-home', [AdminDashboardController::class, 'index'])->name('admin-home');
    Route::resource('/admin/users', UserController::class);
   
});
Route::group(['middleware' => 'check.role:employee'], function () {
    Route::get('/employee-home', [EmployeeDashboardController::class, 'index'])->name('employee-home');
});


