<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoapController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Define SOAP WSDL and server actions
Route::get('soap/wsdl', [SoapController::class, 'wsdl'])->name('soap.wsdl');
Route::post('soap/server', [SoapController::class, 'server'])->name('soap.server');
Route::get('soap/test', [SoapController::class, 'test'])->name('soap.test');

