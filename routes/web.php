<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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


Route::get('emp/index', [EmployeeController::class , 'index'])->name('emp_index');
Route::get('emp/create', [EmployeeController::class , 'create'])->name('emp_create');
Route::post('emp/store', [EmployeeController::class , 'store'])->name('emp_store');
Route::get('emp/edit/{id}', [EmployeeController::class , 'edit'])->name('emp_edit');
Route::post('emp/upadte', [EmployeeController::class , 'upadte'])->name('emp_upadte');
Route::get('emp/delete/{id}', [EmployeeController::class , 'delete'])->name('emp_delete');
