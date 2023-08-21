@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Support Ticket ID: ') }} {{ $supportTicket->reference_number }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-3">
                        <label for="customer_name" class="col-md-4 col-form-label text-md-end">{{ __('Ticket Status:') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" value="{{ ucfirst($supportTicket->status) }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="customer_name" class="col-md-4 col-form-label text-md-end">{{ __('Customer Name:') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" value="{{ $supportTicket->customer_name }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="problem_description" class="col-md-4 col-form-label text-md-end">{{ __('Problem Description:') }}</label>

                        <div class="col-md-6">
                            <textarea class="form-control" rows="4" cols="10">
                                {{ $supportTicket->problem_description }}
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number:') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" value="{{ $supportTicket->phone_number }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address:') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" value="{{ $supportTicket->email }}" readonly>
                        </div>
                    </div>
                </div>
                <hr/>
                @if ($supportTicket->status == \App\Models\SupportTicket::STATUS_NEW)
                    <div class="row mb-3">
                        <div class="col-md d-flex justify-content-end">
                            <a type="button" href="{{ route('tickets.all') }}" class="btn btn-warning mx-1">Go Back</a>
                            <a type="button" href="{{ route('tickets.assign', $supportTicket->id) }}" class="btn btn-success mx-1">Pick This</a>
                        </div>
                    </div>
                @else
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('tickets.reply', $supportTicket->id) }}">
                        {!! csrf_field() !!}
                        @method('PATCH')

                        <div class="row">
                            <label for="agent_reply" class="col-md col-form-label text-md-start mx-3">{{ __('Reply:') }}</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md text-md-start mx-3">
                                <textarea rows="10" id="agent_reply" type="text" class="form-control @error('agent_reply:') is-invalid @enderror" name="agent_reply" value="{{ old('agent_reply') }}" required autocomplete="agent_reply">
                                    {{$supportTicket->agent_reply }}
                                </textarea>

                                @if ($errors->has('agent_reply'))
                                    <span class="text-danger" role="alert">
                                        <strong>*The agent reply field must be at least 10 characters.</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md d-flex justify-content-end">
                                <a type="button" href="{{ route('tickets.all') }}" class="btn btn-warning mx-1">Go Back</a>
                                @if ($supportTicket->status == \App\Models\SupportTicket::STATUS_IN_REVIEW)
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input class="btn btn-success mx-1" type="submit" name="submit" value="Send Reply">
                                @endif
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
