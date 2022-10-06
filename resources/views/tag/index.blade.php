@extends('layouts.app')

@section('title', 'Tags')

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
                    <table class="table table-striped table-light">
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr>
                                <td>
                                   <h4><span class="badge {{ $tag->style }}">{{ $tag->name}}</span></h4>
                                </td>
                                <td>
                                    <a href="/tag/{{ $tag->id }}" class="btn btn-primary btn-sm me-3">Details anzeigen</a>
                                    <a href="/tag/{{ $tag->id }}/edit" class="btn btn-warning btn-sm me-2"><i class="fa-solid fa-pen"></i> Bearbeiten</a>
                                    <form action="/tag/{{ $tag->id }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-delete-left"></i> Löschen</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{ route('tag.create') }}" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i> Neuen Tag anlegen</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection