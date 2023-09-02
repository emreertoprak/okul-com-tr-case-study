<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\School\SchoolController;

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

Route::group(
    [
        'middleware' => [
            'api.public',
        ]
    ],
    function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/user', [UserController::class, 'store']);
    }
);

Route::group(
    [
        'middleware' => [
            'api.admin',
        ]
    ],
    function () {
        Route::get('/offer', [OfferController::class, 'index']);
        Route::put('offer/{id}', [OfferController::class, 'updateById']);
        Route::post('school', [SchoolController::class, 'store']);
        Route::get('user', [UserController::class, 'index']);
    }
);

Route::group(
    [
        'middleware' => [
            'api.user'
        ]
    ],
    function () {
        Route::post('/offer', [OfferController::class, 'store']);
        Route::post('school', [SchoolController::class, 'store']);
        Route::get('school', [SchoolController::class, 'index']);
    }
);

