@extends('layouts.app')

@section('title', 'Tags')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('tag.index') }}" class="btn btn-outline-success mb-3"><i class="fa-regular fa-circle-up"></i> Zurück</a>

            <div class="card">
                <div class="card-header">{{ __('Tag bearbeiten') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/tag/{{ $tag->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" id="name" name="name" value="{{ old('name') ?? $tag->name }}">
                          <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                        </div>
                        <div class="mb-3">
                          <label for="beschreibung" class="form-label">Style</label>
                          <select name="style" id="style" name="style" class="form-select form-select-lg {{ $errors->has('style') ? 'border-danger' : '' }}">
                            <option value="bg-primary text-white" class="bg-primary text-white">Primary</option>
                            <option value="bg-secondary text-white" class="bg-secondary text-white">Secondary</option>
                            <option value="bg-success text-white" class="bg-success text-white">Success</option>
                            <option value="bg-info text-white" class="bg-info text-white">Info</option>
                            <option value="bg-warning text-white" class="bg-warning text-white">Warning</option>
                            <option value="bg-light" class="bg-light">Light</option>
                            <option value="bg-dark text-white" class="bg-dark text-white">Dark</option>
                          </select>
                          <small class="form-text text-danger">{!! $errors->first('style') !!}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection