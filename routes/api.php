<?php

use App\Http\Controllers\DrugInformationController;
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
Route::post('/returnSpecificUser', [UserController::class, 'returnSpecificUser']);
Route::post('/createUser', [UserController::class, 'create']);
Route::post('/updateUser', [UserController::class, 'updateUser']);
Route::post('/deleteUser', [UserController::class, 'deleteUser']);

Route::get('/loadAllDrugPrescriptions', [DrugInformationController::class, 'loadAllDrugPrescriptions']);
Route::post('/loadUsersDrugPrescriptions', [DrugInformationController::class, 'loadUsersDrugPrescriptions']);
Route::post('/createDrugPrescription', [DrugInformationController::class, 'createDrugPrescription']);

Route::post('/updateDrugPrescription', [DrugInformationController::class, 'updateDrugPrescription']);
Route::post('/deleteDrugPrescription', [DrugInformationController::class, 'deleteDrugPrescription']);

Route::post('/sendReminderForPrescription', [DrugInformationController::class, 'sendReminderForPrescription']);


