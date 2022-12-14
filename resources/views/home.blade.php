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
                    <h3>Hallo {{ auth()->user()->name}}</h3>
                   <a href="/hobby/create" class="btn btn-success">Neues Hobby anlegen</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
