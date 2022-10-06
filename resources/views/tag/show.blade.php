@extends('layouts.app')

@section('title', 'Tag Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Tag Übersicht') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <h3> <span class="badge {{ $tag->style }}">{{ $tag->name}}</span> </h3> 
                    <a href="{{ route('tag.index') }}" class="btn btn-outline-success"> Zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection