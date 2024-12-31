<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RsvpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/rsvps', [RsvpController::class, 'index']);
Route::get('/rsvps/check/{invitationId}', [RsvpController::class, 'check']);
Route::post('/rsvps', [RsvpController::class, 'store']);
Route::post('/rsvps/{invitationId}', [RsvpController::class, 'update']);

Route::get('/invitations/generate', [InvitationController::class, 'generate']);