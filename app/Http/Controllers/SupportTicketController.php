<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupportTicketRequest;
use App\Http\Requests\ReplySupportTicketRequest;
use App\Models\SupportTicket;
use App\Notifications\SupportTicketCreatedNotification;
use App\Notifications\SupportTicketPickedNotification;
use App\Notifications\SupportTicketCompletedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supportTicket = SupportTicket::paginate(10);

        return view('tickets.index', compact('supportTicket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupportTicketRequest $request)
    {
        $timestamp = now()->format('imsHydi');
        $randomString = Str::random(4);
        $uniqueReference = $randomString . $timestamp;

        $data = $request->all();

        $supportTicket = SupportTicket::create([
            'customer_name' => $data['customer_name'],
            'problem_description' => $data['problem_description'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'status' => SupportTicket::STATUS_NEW,
            'reference_number' => $uniqueReference
        ]);

        $supportTicket->notify(new SupportTicketCreatedNotification($supportTicket));

        return redirect()->back()->with("status", "A ticket with ID:' $uniqueReference' has been submitted.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $reference)
    {
        // dd($reference);
        $supportTicket = SupportTicket::where('reference_number', $reference)->first();
        return view('tickets.view', ['supportTicket' => $supportTicket]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupportTicket $supportTicket)
    {
        //
    }

    public function search(Request $request)
    {

    }

    public function pickTicket(SupportTicket $supportTicket)
    {
        return view('tickets.pick-ticket', ['supportTicket' => $supportTicket]);
    }

    public function assignMe(SupportTicket $supportTicket)
    {
        $supportTicket->agent_id = Auth::user()->id;
        $supportTicket->status = SupportTicket::STATUS_IN_REVIEW;
        $supportTicket->save();

        $supportTicket->notify(new SupportTicketPickedNotification($supportTicket));

        return redirect()->back()->with("status", "Ticket is assigned to you.");
    }

    public function sendReply(ReplySupportTicketRequest $request, SupportTicket $supportTicket)
    {
        $supportTicket->agent_id = Auth::user()->id;
        $supportTicket->status = SupportTicket::STATUS_COMPLETED;
        $supportTicket->agent_reply = $request->agent_reply;
        $supportTicket->save();

        $supportTicket->notify(new SupportTicketCompletedNotification($supportTicket));

        return redirect()->back()->with("status", "Ticket is completed.");
    }

}