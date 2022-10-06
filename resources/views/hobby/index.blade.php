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
                                    <a href="/hobby/{{ $hobby->id }}" class="btn btn-primary btn-sm me-3">Details anzeigen</a>
                                    <a href="/hobby/{{ $hobby->id }}/edit" class="btn btn-warning btn-sm me-2"><i class="fa-solid fa-pen"></i> Bearbeiten</a>
                                    <form action="/hobby/{{ $hobby->id }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-delete-left"></i> Löschen</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{ route('hobby.create') }}" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i> Neues Hobby anlegen</a>
                    <div class="mt-3">
                        {{ $hobbies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection