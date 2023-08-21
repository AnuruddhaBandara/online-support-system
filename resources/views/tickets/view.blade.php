@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Support Ticket ID: ') }} {{ $supportTicket->reference_number }}</div>

                <div class="card-body">
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
                    <div class="row mb-3">
                        <div class="col-md d-flex justify-content-end">
                            <a type="button" href="/" class="btn btn-warning mx-1">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
