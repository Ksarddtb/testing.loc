<?php

use App\Http\Controllers\Api\LectionController;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\StudentController;
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
Route::apiResource('student',StudentController::class);
// Route::post('student/class/{student}',[StudentController::class,'changeclass']);
// Route::PUT('student/class/{student}',[StudentController::class,'updateclass']);
Route::DELETE('student/class/{student}',[StudentController::class,'deleteclass']);
Route::apiResource('classroom',StudentClassController::class);
Route::apiResource('lection',LectionController::class);
Route::POST('classroom/lection/',[StudentClassController::class,'store_lection']);
Route::DELETE('classroom/lection/{classroom}',[StudentClassController::class,'delete_lection']);
Route::PUT('classroom/lection/{classroom}',[StudentClassController::class,'update_lection']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
