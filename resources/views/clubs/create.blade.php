@extends('layout.template')
@section('title', 'Klub')
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
        <form action="{{ route('clubs.store') }}" method="post">
        @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Klub</label>
                <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Nama Klub</label>
                <input class="form-control" type="text" id="city" name="city">
            </div>
            <div class="mb-3">
                <label for="coach" class="form-label">Nama Pelatih</label>
                <input class="form-control" type="text" id="coach" name="coach">
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a href="{{ route('clubs.index') }}" class="btn btn-outline-primary">Kembali</a>
        </form>
    </div>
</div>
@endsection
