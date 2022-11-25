<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MembershipController;
use App\Http\Controllers\API\TripController;
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


Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('admin/users', [AdminController::class,'userIndex']);
    Route::put('admin/users/{id}', [AdminController::class,'makeAdmin']);
    Route::delete('admin/users/{id}', [AdminController::class,'deleteUser']);

    Route::post('admin/trips/{id}', [TripController::class,'store']);
    Route::delete('admin/trips/{id}', [TripController::class,'destroy']);
    Route::put('admin/trips/{id}', [TripController::class,'update']);
});



Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);


Route::get('/memberships', [MembershipController::class,'index']);
Route::get('/memberships/{id}', [MembershipController::class,'show']);


Route::get('/trips', [TripController::class,'index']);
Route::get('/trips/{id}', [TripController::class,'show']);