<?php

use App\Http\Controllers\HighLightController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\NewsFakeController;
use App\Http\Controllers\NormalAdController;
use App\Http\Controllers\TvChannelController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Live Get
Route::get('amikesar/live', [LiveController::class, 'index']);
Route::post('amikesar/live/link', [LiveController::class, 'show']);

//HighLight Get
Route::get('amikesar/highlight', [HighLightController::class, 'index']);
Route::post('amikesar/highlight/link', [HighLightController::class, 'show']);

//Ads Get
Route::get('amikesar/tvchannel', [TvChannelController::class, 'index']);

//Ads Get
Route::get('amikesar/normalads', [NormalAdController::class, 'index']);

//News Get
Route::get('amikesar/news', [NewsFakeController::class, 'index']);

