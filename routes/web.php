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

Route::get('/tickets/create', [SupportTicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [SupportTicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{reference}', [SupportTicketController::class, 'show'])->name('tickets.show');
Route::put('/tickets/{supportTicket}', [SupportTicketController::class, 'update'])->name('tickets.update');
Route::get('/tickets/search', [SupportTicketController::class, 'searchByReference'])->name('tickets.customer.search');

Route::middleware(['auth'])->group(function () {
    Route::get('/tickets', [SupportTicketController::class, 'index'])->name('tickets.all');
    Route::get('/tickets/pick-ticket/{supportTicket}', [SupportTicketController::class, 'pickTicket'])->name('tickets.pick');
    Route::get('/tickets/assign-me/{supportTicket}', [SupportTicketController::class, 'assignMe'])->name('tickets.assign');
    Route::patch('/tickets/reply/{supportTicket}', [SupportTicketController::class, 'sendReply'])->name('tickets.reply');
    Route::get('/tickets/agent/search', [SupportTicketController::class, 'searchByCustomerName'])->name('tickets.agent.search');
});
