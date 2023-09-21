@extends('layout.template')
@section('title', 'Pertandingan')
@section('content')
@if(session('error'))
<div class="d-flex justify-content-between align-items-center alert alert-danger" role="alert">
    {{ @session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
<form action="{{ route('games.update', ['game' => $game->id]) }}" method="post">
    @csrf
    @method('put')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ $game->match_date }}</div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->homeTeam->name }}</h5>
                        <input type="hidden" name="home_team" value="{{ $game->home_team }}">
                        <input class="form-control" type="text" id="home_score" name="home_score" value="{{ $game->home_score }}">
                    </div>
                    <div class="h5">VS</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->awayTeam->name }}</h5>
                        <input type="hidden" name="away_team" value="{{ $game->away_team }}">
                        <input class="form-control" type="text" id="away_score" name="away_score" value="{{ $game->away_score }}">
                    </div>
                </div>
                <div class="card-body pt-0">
                    <label for="status" class="form-label">Status Pertandingan</label>
                    <select class="form-control" name="status" id="status">
                        <option value="ongoing">Berlangsung</option>
                        <option value="done">Telah Selesai</option>
                    </select>
                </div>
                <div class="card-body pt-0">
                    <button type="submit" class="btn btn-primary me-3">Simpan</button>
                    <a href="{{ route('games.index') }}" class="btn btn-outline-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
