<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

  Route::post('insertProduct',[ProductController::class,'store']);
  Route::get('dashboard',[ProductController::class,'index'])->name('dashboard');
  Route::get('update_product/{id}',[ProductController::class,'updateproduct']);
  Route::post('productupdates',[ProductController::class,'update']);
  Route::get('delete_product/{id}',[ProductController::class,'deleteProduct']);
  Route::get('/active/{id}',[ProductController::class,'active']);
  Route::get('/deactive/{id}',[ProductController::class,'deactive']);
});


