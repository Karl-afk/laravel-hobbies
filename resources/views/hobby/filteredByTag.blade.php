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
                        <thead>
                            <tr>
                                <th>Hobby</th>
                                <th>Tags</th>
                                <th>Name</th>
                                <th>Anzahl</th>
                                <th>Aktionen</th>
                                <th>Erstellt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hobbies as $hobby)
                            <tr>
                                <td>
                                   {{ $hobby->name}}
                                </td>
                                <td>
                                    @foreach ($hobby->tags as $tag)
                                        <a href="/hobby/tag/{{ $tag->id }}" class="badge {{ $tag->style }}">{{ $tag->name }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="/user/{{ $hobby->user->id }}">{{$hobby->user->name}}</a>
                                </td>
                                <td>
                                    {{$hobby->user->hobbies->count()}}
                                </td>
                                <td>
                                    <a href="/hobby/{{ $hobby->id }}" class="btn btn-primary btn-sm me-3">Details anzeigen</a>
                                    <a href="/hobby/{{ $hobby->id }}/edit" class="btn btn-warning btn-sm me-2"><i class="fa-solid fa-pen"></i> Bearbeiten</a>
                                    <form action="/hobby/{{ $hobby->id }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-delete-left"></i> Löschen</a>
                                    </form>
                                </td>
                                <td>
                                    {{$hobby->created_at->diffForHumans()}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @auth
                    <a href="{{ route('hobby.create') }}" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i> Neues Hobby anlegen</a>
                    @endauth
                    <div class="mt-3">
                        {{ $hobbies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection