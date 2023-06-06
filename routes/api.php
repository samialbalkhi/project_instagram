<?php

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewpasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class,'logout']);
    Route::get('ShowUser',[UserController::class, 'showuser']);
    ////////    profile users      /////////////
    Route::prefix('profile')->group(function () {
    Route::get('/InformationUser',[ProfileController::class,'infouser']);    
    Route::post('/create',[ProfileController::class,'create']);
    Route::post('/update',[ProfileController::class,'update']);
});

Route::prefix('posts')->group(function () {
        Route::post('create',[PostController::class,'create']);
        Route::delete('delete/{id}',[PostController::class,'delete']);


});
});
////////////       AuthController         //////////////
Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);

/////////    new password              ////////////////////
Route::post('Forgetpassword', [NewpasswordController::class,'Forgetpassword']);
Route::post('Resetpassword', [NewpasswordController::class,'reset']);

