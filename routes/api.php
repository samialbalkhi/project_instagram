<?php

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollwsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewpasswordController;
use App\Http\Controllers\PostLikeController;

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
    Route::post('logout', [AuthController::class, 'logout']);

    ////         //////
    Route::get('ShowUser', [UserController::class, 'showuser']);
    ////////    profile users      /////////////
    Route::prefix('profile')->group(function () {
        Route::get('/InformationUser', [ProfileController::class, 'infouser']);
        Route::post('/create', [ProfileController::class, 'create']);
        Route::post('/update', [ProfileController::class, 'update']);
    });
    ////////////   posts          //////////////
    Route::prefix('posts')->group(function () {
        Route::post('create', [PostController::class, 'create']);
        Route::delete('delete/{id}', [PostController::class, 'delete']);
    });
    Route::prefix('Likes')->group(function () {
        Route::post('create/{post}', [PostLikeController::class, 'create']);
        Route::delete('delete/{post}', [PostLikeController::class, 'delete']);
    });
    Route::prefix('Follws')->group(function () {
        Route::post('create/{user}',[FollwsController::class, 'create']);
    });
});

////////////       AuthController         //////////////
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

/////////    new password              ////////////////////
Route::post('Forgetpassword', [NewpasswordController::class, 'Forgetpassword']);
Route::post('Resetpassword', [NewpasswordController::class, 'reset']);
