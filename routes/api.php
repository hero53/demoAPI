<?php

use App\Http\Controllers\Api\Announcement;
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



Route::get('announcements/all', [Announcement::class, 'index']);
Route::post('announcements/add', [Announcement::class, 'store']);
Route::get('announcements/get/{id}', [Announcement::class, 'show']);
Route::post('announcements/update/{id}', [Announcement::class, 'update']);
Route::get('announcements/delete/{id}', [Announcement::class, 'destroy']);
