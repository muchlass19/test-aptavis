@extends('layout.template')
@section('title', 'Pertandingan')
@section('content')

@if(session('error'))
<div class="d-flex justify-content-between align-items-center alert alert-danger" role="alert">
    {{ @session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<h5 class="card-title fw-semibold mb-4">Tambah Form</h5>
<div class="card">
    <div class="card-body">
        <form action="{{ route('games.store') }}" method="post">
        @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Home Team</label>
                <select class="form-control" name="home_team" id="home_team" name="home_team">
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Away Team</label>
                <select class="form-control" name="away_team" id="away_team" name="away_team">
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="match_date" class="form-label">Tanggal Pertandingan</label>
                <input class="form-control" type="date" id="match_date" name="match_date">
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a href="{{ route('clubs.index') }}" class="btn btn-outline-primary">Kembali</a>
        </form>
    </div>
</div>
@endsection
