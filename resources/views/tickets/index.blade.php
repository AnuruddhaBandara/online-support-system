@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Open Tickets') }}</div>

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
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($supportTicket as $id => $ticket)
                                    <tr>
                                        <td>{{ $id+1 }}</td>
                                        <td>
                                            <a href="{{ url('tickets/'. $ticket->reference_number) }}">
                                                #{{ $ticket->reference_number }}
                                            </a>
                                        </td>
                                        <td>{{$ticket->customer_name}}</td>

                                        <td>
                                        @if ($ticket->status == \App\Models\SupportTicket::STATUS_NEW)
                                            <span class="label badge bg-secondary">{{ $ticket->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                        </td>
                                        <td>{{ $ticket->created_at }}</td>
                                        <td>Reply, Pick</td>
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
