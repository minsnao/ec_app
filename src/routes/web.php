<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Models\Item;

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

Route::middleware(['auth', 'profile.set'])->group(function() {
    Route::get('/sell', [ItemController::class, 'create']);
    Route::post('/sell', [ItemController::class, 'store']);

    Route::post('/item/{item}/comments', [CommentController::class, 'store']);
    Route::post('/item/{item}/like', [LikeController::class, 'toggle']);

    Route::get('/purchase/address/{item}', [PurchaseController::class, 'edit']);
    Route::patch('/purchase/address/{item}', [PurchaseController::class, 'update']);
    Route::get('/purchase/{item}', [PurchaseController::class, 'confirm']);
    Route::post('/purchase/{item}', [PurchaseController::class, 'store']);
});

Route::middleware(['auth'])->group(function() {
    Route::get('/mypage', [ProfileController::class, 'show']);
    Route::get('/mypage/profile', [ProfileController::class, 'edit']);
    Route::patch('/mypage/profile', [ProfileController::class, 'update']);
});





