<?php

use App\Http\Controllers\MedController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/medsearch', function () {
    return Inertia\Inertia::render('MedSearch', ['user' => Auth::user()]);
})->name('medsearch');

Route::resource('meds', MedController::class);

Route::get('/search/{med}', [MedController::class, 'search']);