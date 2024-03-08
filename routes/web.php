<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

Route::get('/', [CustomerController::class, 'index']);
Route::get('/customers/create', [CustomerController::class, 'show_create_page']);
Route::get('/customers/edit/{id}', [CustomerController::class, 'show_edit_page']);
Route::get('/customers/detail/{id}', [CustomerController::class, 'show_view_detail']);
Route::post('/add_customer', [CustomerController::class, 'add_customer']);
Route::put('/update_customer/{id}', [CustomerController::class, 'update_customer']);
Route::delete('/customers/delete/{id}', [CustomerController::class, 'delete_customer']);
