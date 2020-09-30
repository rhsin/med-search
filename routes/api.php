<?php


use App\Http\Controllers\API\MedController;
use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\UserController;
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

Route::apiResource('users', UserController::class);

Route::get('/search/{med}', [SearchController::class, 'search']);

Route::get('/first/{med}', [SearchController::class, 'searchFirst']);

Route::get('/test/token', [UserController::class, 'createToken']);

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);
