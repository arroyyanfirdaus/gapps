@extends('templates.default')
@php
    $title = 'Dashboard';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('terlambat.index') }}">
                        <h5 class="card-title">Jumlah Karyawan Terlambat</h5>
                    </a>
                    <p class="card-text">{{ $jumlahKaryawanTerlambat }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('akses.index') }}">
                        <h5 class="card-title">Jumlah Karyawan Keluar Masuk</h5>
                    </a>
                    <p class="card-text">{{ $jumlahKaryawanKeluarMasuk }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('gatepass.index') }}">
                        <h5 class="card-title">Jumlah Penerima GatePass</h5>
                    </a>
                    <p class="card-text">{{ $jumlahPenerimaGatePass }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
