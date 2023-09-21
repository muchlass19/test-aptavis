@extends('layout.template')
@section('title', 'Pertandingan')
@section('content')

@if(session('success'))
<div class="d-flex justify-content-between align-items-center alert alert-success" role="alert">
    {{ @session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Pertandingan</h1>
    <a class="btn btn-primary" href="{{ route('games.create') }}">Tambah Pertandingan</a>
</div>

<div class="row">
    @foreach($games as $game)
    <div class="col-md-4">
        <div class="card">
        <div class="card-header">
            {{ $game->match_date }}
        </div>
        <div class="card-body">
            <h5 class="card-title mb-3">{{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}</h5>
            <a href="{{ route('games.show', ['game' => $game->id]) }}" class="btn btn-primary">Detail</a>
            @if($game->status == 'ongoing')<a class="btn btn-warning" href="{{ route('games.edit', ['game' => $game->id]) }}">Update Skor</a>@endif
            <a href="{{ route('games.destroy', ['game' => $game->id]) }}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
