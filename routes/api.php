<?php

use App\Http\Controllers\Hbv2UserController;
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

| require __DIR__.'/frontend.php'; //to create custom route file and then include that in the main route file
|
*/
Route::prefix('v1')->group(function () {
    Route::group(['prefix' => '/users'], function () {
        Route::get('/', [Hbv2UserController::class, 'getUsers']);
        Route::get('/{id}', [Hbv2UserController::class, 'getUser']);
        Route::post('/', [Hbv2UserController::class, 'createUser']);
        Route::patch('/{id}', [Hbv2UserController::class, 'updateUser']);
        Route::delete('/{id}', [Hbv2UserController::class, 'deleteUser']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Application is healthy',
    ]);
});
