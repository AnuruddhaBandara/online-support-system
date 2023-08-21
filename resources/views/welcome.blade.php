<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    </head>
    <body class="container bg-light">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col d-flex justify-content-end m-3">
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a href="{{ url('/home') }}" class="btn btn-outline btn-outline-primary">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-outline btn-outline-success">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-outline btn-outline-info">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
                @if (session('status'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="row">
                        <div class="col d-flex justify-content-end">

                            </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row d-flex justify-content-end">
                            <div class="col-sm col-md-8">
                                <div class="row my-2 px-1 w-100">
                                    <form action="{{ route('tickets.customer.search') }}" method="GET" class="float-right col-sm">
                                        @csrf
                                        <div class="input-group input-group-sm col-md-8">
                                        <input type="text" name="q" class="form-control" placeholder="-- Search by Reference Number --">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default bg-secondary">
                                                <i class="fas fa-search"></i> Search My Ticket
                                            </button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm col-md d-flex justify-content-end">
                                <a href="{{ route('tickets.create') }}" class="btn btn-md btn-success my-2">Create New Support Ticket</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col">
                        <h2 class="text-center py-2">Online Support System</h2>
                        <h4 class="text-center py-3">
                                   Elegant Media Australia
                        </h4>

                        <h6 class="text-center py-3">
                                   Anuruddha Bandara
                        </h6>

                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
