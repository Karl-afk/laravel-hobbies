@extends('layouts.app')

@section('title', 'Hobby Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Hobby Übersicht') }} <a href="/user/{{ $hobby->user->id }}"><h4 class="float-end">{{$hobby->user->name}}</h4></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        @foreach ($hobby->tags as $tag)
                                            <a href="/hobby/tag/{{ $tag->id }}" class="badge {{ $tag->style }}">{{ $tag->name }}</a>
                                        @endforeach
                    </div>
                       <h3> {{ $hobby->name}} </h3> 
                       <p> {{$hobby->beschreibung}} </p>
                    <a href="{{ URL::previous() }}" class="btn btn-outline-success"> Zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection