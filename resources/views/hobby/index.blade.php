@extends('layouts.app')

@section('title', 'Hobbies')

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
                    <table class="table table-striped table-light">
                        <tbody>
                            @foreach ($hobbies as $hobby)
                            <tr>
                                <td>
                                   {{ $hobby->name}}
                                </td>
                                <td>
                                    <a href="/hobby/{{ $hobby->id }}" class="btn btn-primary btn-sm">Details anzeigen</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{ route('hobby.create') }}" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i> Neues Hobby anlegen</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection