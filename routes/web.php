<?php

use App\Http\Controllers\SupportTicketController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tickets', [SupportTicketController::class, 'index'])->name('tickets.all');
Route::get('/tickets/create', [SupportTicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [SupportTicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{reference}', [SupportTicketController::class, 'show'])->name('tickets.show');
Route::put('/tickets/{supportTicket}', [SupportTicketController::class, 'update'])->name('tickets.update');
Route::get('/tickets/search/{searchParam}', [SupportTicketController::class, 'search'])->name('tickets.search');

