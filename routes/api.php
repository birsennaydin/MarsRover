<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ApiRoverController;
use App\Http\Controllers\API\ApiPlateauController;


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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('create_plateau', [ApiPlateauController::class, 'createPlateau']);
Route::middleware('auth:api')->post('get_plateau', [ApiPlateauController::class, 'plateau']);
Route::middleware('auth:api')->post('create_rover', [ApiRoverController::class, 'createRover']);
Route::middleware('auth:api')->post('send_commands', [ApiRoverController::class, 'sendCommands']);
