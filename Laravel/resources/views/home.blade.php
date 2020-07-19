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
                </div>
            </div>
            <div class="my-3">
                <h1>My Site</h1>

                @can('edit_forum')
                <li>
                    <a href="#">Edit Forum</a>
                </li>
                @endcan

                @can('view_reports')
                <li>
                    <a href="/reports">View Reports</a>
                </li>
                @endcan

            </div>
        </div>
    </div>
</div>
@endsection
