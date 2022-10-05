@extends('layouts.app')

@section('title', 'Hobby Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Hobby Übersicht') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <h3> {{ $hobby->name}} </h3> 
                       <p> {{$hobby->beschreibung}} </p>
                    <a href="{{ route('hobby.index') }}" class="btn btn-outline-success"> Zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection