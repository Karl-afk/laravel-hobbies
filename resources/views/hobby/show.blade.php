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
                        @if ($hobby->tags->count() > 0)
                        <div class="mb-3">
                            <p>Verknüpfte Tags: (klicken zum entfernen)</p>
                            @foreach ($hobby->tags as $tag)
                                <a href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/detach" class="me-2 badge {{ $tag->style }}">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                            
                        @endif
                    <div class="mb-3">
                        <p>Verfügbare Tags: (klicken zum hinzufügen)</p>
                        @foreach ($verfuegbareTags as $tag)
                            <a href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/attach" class="me-2 badge {{ $tag->style }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                       <h3> {{ $hobby->name}} </h3> 
                       <p> {{$hobby->beschreibung}} </p>
                    <a href="{{ route('hobby.index') }}" class="btn btn-outline-success"> Zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection