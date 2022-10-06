@extends('layouts.app')

@section('title', 'User Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('User Übersicht') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <h3> {{ $user->name}} </h3> 
                       <h4>Motto:</h4>
                       <p> {{$user->motto}} </p>
                       <h4>Über mich:</h4>
                       <p> {{$user->ueber_mich}} </p>
                    <a href="{{ URL::previous() }}" class="btn btn-outline-success"> Zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection