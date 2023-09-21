@extends('layout.template')
@section('title', 'Klub')
@section('content')
<h5 class="card-title fw-semibold mb-4">Edit Form</h5>
<div class="card">
    <div class="card-body">
        <form action="{{ route('clubs.update', ['club' => $club->id]) }}" method="post">
        @csrf
        @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Klub</label>
                <input class="form-control" type="text" id="name" name="name" value="{{$club->name}}">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Nama Klub</label>
                <input class="form-control" type="text" id="city" name="city" value="{{$club->city}}">
            </div>
            <div class="mb-3">
                <label for="coach" class="form-label">Nama Pelatih</label>
                <input class="form-control" type="text" id="coach" name="coach" value="{{$club->coach}}">
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a href="{{ route('clubs.index') }}" class="btn btn-outline-primary">Kembali</a>
        </form>
    </div>
</div>
@endsection
