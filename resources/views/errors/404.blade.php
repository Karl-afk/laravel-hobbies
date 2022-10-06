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
                        <h1>404 Seite nicht gefunden</h1>
                        <h2>{{ $exception->getMessage() }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection