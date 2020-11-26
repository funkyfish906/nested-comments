<?php

use App\Http\Controllers\CommentController;
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

Route::get('/',  [CommentController::class, 'index']);
Route::get('comments/list',  [CommentController::class, 'list']);
Route::post('comments', [CommentController::class, 'store']);
