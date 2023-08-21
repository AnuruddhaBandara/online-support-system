<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $supportTicket = SupportTicket::orderByRaw("CASE WHEN status = 'new' THEN 1 ELSE 2 END, created_at DESC")->paginate(15);

        return view('tickets.index', compact('supportTicket'));
    }
}