@extends('layouts.base-user')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <div class="card-body">
                    <h2 class="card-title">Dasboard Mitra</h2>
                    <img src="{{ asset('images/image 3.png') }}">
                </div>
            </div>
            <div class="col-md-6 py-5">
                <div class="d-grid gap-5">
                    <button class="btn btn-theme-two px-5 py-4 fw-medium" type="button">Lowongan
                        <i class="fas fa-search" style="font-size: 2em;"></i>
                    </button>
                    <button class="btn btn-theme-two px-5 py-4 fw-medium" type="button">Pendamping Lapang
                        <i class="fas fa-user" style="font-size: 2em;"></i>
                    </button>
                    <button class="btn btn-theme-two px-5 py-4 fw-medium" type="button">Penilaian Mahasiswa Akhir
                        <i class="fas fa-book" style="font-size: 2em;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection