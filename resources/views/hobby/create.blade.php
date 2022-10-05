@extends('layouts.app')

@section('title', 'Hobbies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('hobby.index') }}" class="btn btn-outline-success mb-3"><i class="fa-regular fa-circle-up"></i> Zurück</a>

            <div class="card">
                <div class="card-header">{{ __('Neues Hobby anlegen') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form>
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                          <label for="beschreibung" class="form-label">Beschreibung</label>
                          <textarea type="text" class="form-control" id="beschreibung" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection