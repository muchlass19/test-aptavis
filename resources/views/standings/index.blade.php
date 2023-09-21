@extends('layout.template')
@section('title', 'Klasemen')
@section('content')

@if(session('success'))
<div class="d-flex justify-content-between align-items-center alert alert-success" role="alert">
    {{ @session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="mb-3 d-flex justify-content-between align-items-center">
    <h1>Klasemen</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Reset Klasemen
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Klasemen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>PERHATIAN! Kamu juga akan menghapus seluruh jadwal pertandingan. <strong>Apakah kamu yakin?</strong></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('standings.reset') }}" type="button" class="btn btn-danger">Hapus</a>
            </div>
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Peringkat</th>
            <th scope="col">Nama Klub</th>
            <th scope="col">Ma</th>
            <th scope="col">Me</th>
            <th scope="col">S</th>
            <th scope="col">K</th>
            <th scope="col">GM</th>
            <th scope="col">GK</th>
            <th scope="col">SP</th>
            <th scope="col">Poin</th>
        </tr>
    </thead>
    <tbody>

        @foreach($standings as $key => $standing)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $standing->clubs->name }}</td>
            <td>{{ $standing->play }}</td>
            <td>{{ $standing->win }}</td>
            <td>{{ $standing->draw }}</td>
            <td>{{ $standing->lose }}</td>
            <td>{{ $standing->goal_win }}</td>
            <td>{{ $standing->goal_lose }}</td>
            <td>{{ $standing->point_difference }}</td>
            <td>{{ $standing->point }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
