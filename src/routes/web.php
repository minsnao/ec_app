<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CommentController;


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

//Route::get('/',  [00000000Controller::class, 'index']);

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{id}', [ItemController::class, 'show']);
Route::get('/sell', [ItemController::class, 'create']);
Route::post('/sell', [ItemController::class, 'store']);
Route::post('/item/{item}/comments', [CommentController::class, 'store'])->middleware('auth');
