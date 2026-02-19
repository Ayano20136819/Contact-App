<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ContactController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Automatically has /api in the prefix
Route::prefix('v1')
    ->as('api.v1.')
    ->group(function () {
        Route::apiResource('/contacts', ContactController::class);
    });


