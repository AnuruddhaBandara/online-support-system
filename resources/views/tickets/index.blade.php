@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                                        <th>Customer Name</th>
                                        <th>Ticket No</th>
                                        <th>Status</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($supportTicket as $ticket)
                                    <tr>
                                        <td>{{$ticket->customer_name}}</td>

                                        <td>
                                            <a href="{{ url('tickets/'. $ticket->reference_number) }}">
                                                #{{ $ticket->reference_number }}
                                            </a>
                                        </td>
                                        <td>
                                        @if ($ticket->status === 'pending')
                                            <span class="label label-info">{{ $ticket->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                        </td>
                                        <td>{{ $ticket->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{-- {{ $supportTicket->render() }} --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
