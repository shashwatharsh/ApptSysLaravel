<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('categories.test');
// });

Route::get('/',[CategoryController::class,'index'])->name('catm');
Route::get('/category-create',[CategoryController::class,'create']);
Route::post('/category-store',[CategoryController::class,'store']);
Route::get('/category-edit/{id}',[CategoryController::class,'edit']);
Route::put('/category-update/{id}',[CategoryController::class,'update']);
Route::delete('/category-delete/{id}',[CategoryController::class,'destroy']);

// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('/exportExcel', [CategoryController::class, 'exportExcel'])->name('exportExcel');

Route::get('login',[AuthController::class,'indexl'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register_view'])->name('register');
Route::post('register',[AuthController::class,'register']);


// Excel 
Route::get('excelinit',[CategoryController::class,'excelinit']);
Route::get('excelexport',[CategoryController::class,'excelexport']);


// Route for sending Email
// Route::get('send-email',[CategoryController::class,'sendmailforapp']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
