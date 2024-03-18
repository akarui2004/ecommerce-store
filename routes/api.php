<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get("/", function() {
    return redirect("/status");
});

Route::get("/status", function() {
    return response()->json(["status" => true, "tz" => Carbon::now()->getTimezone()->getName()]);
});

//jwt authentication
Route::prefix('oauth')->group(function() {
    Route::post('/access_token', [AuthController::class, 'accessToken']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
