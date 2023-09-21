@extends('layout.template')
@section('title', 'Pertandingan')
@section('content')
<div class="card">
    <div class="card-header fw-bold badge {{ $game->status == 'ongoing' ? 'bg-warning' : 'bg-success'}}">{{ $game->status == 'ongoing' ? 'Berlangsung' : 'Selesai' }}</div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card-body">
            <h5 class="card-title">{{ $game->homeTeam->name }}</h5>
            <p class="card-text">{{ $game->home_score }}</p>
        </div>
        <div class="h5">VS</div>
        <div class="card-body">
            <h5 class="card-title">{{ $game->awayTeam->name }}</h5>
            <p class="card-text">{{ $game->away_score }}</p>
        </div>
    </div>
    <div class="card-body pt-0">
        <a href="{{ route('games.index') }}" class="btn btn-outline-primary">Kembali</a>
    </div>
</div>
@endsection
