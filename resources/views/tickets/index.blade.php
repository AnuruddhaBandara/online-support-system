@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md bg-white py-3 rounded shadow">
            <div class="row my-2 px-1 d-flex justify-content-end">
                <form action="{{ route('tickets.agent.search') }}" method="GET" class="float-right col-md-6">
                    @csrf
                    <div class="input-group input-group-sm col-md-8">
                    <input type="text" name="q" class="form-control" placeholder="-- Search by Customer Name --">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default bg-secondary">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header text-center text-bold">
                    <h3>{{ __('Support Tickets') }}</h3>
                </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="panel-body">
                        @if ($supportTicket->isEmpty())
                            <p>You have not created any tickets.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ticket No</th>
                                        <th>Customer Name</th>
                                        <th>Status</th>
                                        <th>Assigned</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $phpVariable = 100; ?>
                                @foreach ($supportTicket as $id => $ticket)
                                    <tr>
                                        <td>{{ $id+1 }}</td>
                                        <td>
                                            <a href="{{ route('tickets.pick', $ticket->id) }}">
                                                #{{ $ticket->reference_number }}
                                            </a>
                                        </td>
                                        <td>{{$ticket->customer_name}}</td>

                                        <td>
                                        @if ($ticket->status == \App\Models\SupportTicket::STATUS_NEW)
                                            <span class="label badge bg-primary">{{ ucfirst($ticket->status) }}</span>
                                        @elseif ($ticket->status == \App\Models\SupportTicket::STATUS_IN_REVIEW)
                                            <span class="label badge bg-danger">{{ ucwords(str_replace("_", " ", $ticket->status)) }}</span>
                                        @elseif ($ticket->status == \App\Models\SupportTicket::STATUS_COMPLETED)
                                            <span class="label badge bg-success">{{ ucfirst($ticket->status) }}</span>
                                        @else
                                            <span class="label badge bg-danger">{{ ucfirst($ticket->status) }}</span>
                                        @endif
                                        </td>
                                        <td>{{ $ticket->agent->name ?? ' - ' }}</td>
                                        <td>{{ $ticket->created_at }}</td>
                                        <td>
                                            @if ($ticket->status == \App\Models\SupportTicket::STATUS_NEW)
                                                 <a href="{{ route('tickets.pick', $ticket->id) }}" class="btn btn-warning view-record-btn">
                                                    <i class="fa fa-pause" aria-hidden="true"></i> Pick
                                                </a>
                                            @elseif ($ticket->status == \App\Models\SupportTicket::STATUS_IN_REVIEW)
                                                <a href="{{ route('tickets.pick', $ticket->id) }}" class="btn btn-success view-record-btn">
                                                    <i class="fa fa-reply" aria-hidden="true"></i> Reply
                                                </a>
                                            @elseif ($ticket->status == \App\Models\SupportTicket::STATUS_COMPLETED)
                                                <a href="{{ route('tickets.pick', $ticket->id) }}" class="btn btn-info view-record-btn">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row mb-3">
                                <div class="col-md d-flex justify-content-end">
                                    {{ $supportTicket->render() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
