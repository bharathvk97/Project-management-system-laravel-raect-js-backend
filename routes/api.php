<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProjectController;
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
Route::post('register',[StaffController::class,'register']);
Route::post('login',[StaffController::class,'login']);
Route::post('addproject',[ProjectController::class,'addproject']);
Route::get('projectlist',[ProjectController::class,'projectlist']);
Route::delete('delete/{id}',[ProjectController::class,'delete']);
Route::get('getsingleproject/{id}',[ProjectController::class,'getsingleproject']);
Route::post('updateproject/{id}',[ProjectController::class,'updateproject']);