<?php

use App\Http\Controllers\GraphController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('hebdo', [TicketController::class,'rechercheHebdo'])->name('envoi');
Route::get('hebdo', [TicketController::class,'rechercheHebdo'])->name('hebdo');

Route::get('/',[TicketController::class,'index']);

Route::resource("tickets", TicketController::class);

Route::post('searchTicket', [SearchController::class, 'search'])->name('searchTicket');
Route::get('searchTicket', [SearchController::class, 'search']);

Route::get('graphTicket', [GraphController::class, 'graphTicket'])->name('graphTicket');
Route::post('rechercheTicketGraph', [GraphController::class, 'graphTicketPeriodeEtUser'])->name('rechercheTicketGraph');
