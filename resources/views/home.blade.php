@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <br>
                    <br>
                    <a class="btn btn-dark" href="{{ route('import') }}">IMPORT</a>
                    <a class="btn btn-success" href="{{ route('payment') }}">SINGLE PAYMENT</a>
                    <a class="btn btn-warning" href="{{ route('plans') }}">SUBSCRIPTION</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
