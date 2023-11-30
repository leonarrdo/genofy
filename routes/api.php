<?php

use App\Http\Controllers\Auth\AuthenticatedTokenController;
use App\Http\Controllers\NotaFiscalController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [AuthenticatedTokenController::class, 'store']);

Route::post('/user', [UserController::class, 'store']);

//Rotas das notas fiscais
Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('/nota', [NotaFiscalController::class, 'store']);
    Route::get('/nota', [NotaFiscalController::class, 'getAll']);
    Route::get('/nota/{numero}', [NotaFiscalController::class, 'getByNumber']);
});