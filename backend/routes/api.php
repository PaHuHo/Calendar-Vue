<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventController;
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

Route::get('/calendar', [CalendarController::class, 'index']);
Route::post('/calendar/add/{id}', [CalendarController::class, 'add']);
Route::post('/calendar/add-new-event', [CalendarController::class, 'addNewEvent']);
Route::post('/calendar/update/{id}', [CalendarController::class, 'store']);
Route::post('/calendar/delete/{id}', [CalendarController::class, 'delete']);


Route::get('/events', [EventController::class, 'index']);
Route::post('/events/add', [EventController::class, 'add']);
Route::post('/events/show/{id}', [EventController::class, 'show']);
Route::post('/events/update/{id}', [EventController::class, 'store']);
Route::post('/events/delete/{id}', [EventController::class, 'delete']);
