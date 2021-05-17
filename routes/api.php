<?php

use App\Http\Controllers\TeamController;
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

# Public Routes
Route::post('teams', [TeamController::class, 'create']);
Route::get('teams', [TeamController::class, 'getAll']);
Route::get('teams/{teamId}', [TeamController::class, 'getById']);
Route::put('teams/{teamId}', [TeamController::class, 'update']);
Route::delete('teams/{teamId}', [TeamController::class, 'delete']);

Route::middleware('auth:api')->group(function () {
    // TODO: Add your authenticated routes here...
});
