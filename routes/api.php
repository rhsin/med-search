<?php

use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Http\Controllers\API\MedController;
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

Route::apiResource('meds', MedController::class);

Route::get('/search/{med}', [MedController::class, 'search']);

Route::get('/first/{med}', [MedController::class, 'searchFirst']);

Route::get('/users', function () {
    return UserResource::collection(User::all());
});