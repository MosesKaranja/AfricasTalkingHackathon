<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/readUsers', [UserController::class, 'read']);
Route::post('/createUser', [UserController::class, 'create']);
Route::post('/updateUser', [UserController::class, 'updateUser']);
Route::post('/deleteUser', [UserController::class, 'deleteUser']);

