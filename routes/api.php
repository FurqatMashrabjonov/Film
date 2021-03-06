<?php

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

Route::post('/upload', function (Request $request){
    return response()->json(['name' => $request->file('video')->getClientOriginalExtension()]);
});

Route::any('/github', function(Request $request){
   \Illuminate\Support\Facades\Log::debug(json_encode($request->all()));
   return response()->json(['success' => true]);
});
