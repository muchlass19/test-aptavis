@extends('layout.template')
@section('title', 'Klub')
@section('content')
<div class="col-12">
    <h5 class="card-title fw-semibold mb-4">Klub Detail</h5>
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $club->name }} - {{ $club->city }}</h5>
        <p class="card-text">Coach: {{ $club->coach ? $club->coach : '-' }}</p>
        <a href="{{ route('clubs.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    </div>
</div>
@endsection
