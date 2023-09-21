@extends('layout.template')
@section('title', 'Klub')
@section('content')

@if(session('success'))
<div class="d-flex justify-content-between align-items-center alert alert-success" role="alert">
    {{ @session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="mb-3 d-flex justify-content-between align-items-center">
    <h1>Klub</h1>
    <a href="{{ route('clubs.create') }}" class="btn btn-primary">Tambah Klub</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nama Klub</th>
      <th scope="col">Kota Klub</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($clubs as $club)
    <tr>
      <td>{{ $club->name }}</td>
      <td>{{ $club->city }}</td>
      <td>
        <a href="{{ route('clubs.show', ['club' => $club->id]) }}" class="btn btn-sm btn-primary">Detail</a>
        <a href="{{ route('clubs.edit', ['club' => $club->id]) }}" class="btn btn-sm btn-warning">Ubah</a>
        <a href="{{ route('clubs.destroy', ['club' => $club->id]) }}" class="btn btn-sm btn-danger">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
