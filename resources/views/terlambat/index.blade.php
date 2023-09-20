@extends('templates.default')
@php
    $title = 'Data Karyawan Terlambat';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('terlambat.create') }}" class="btn btn-primary">Tambah Data Terlambat</a>
@endpush

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-secondary">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" id="" value=""
                                size="3" aria-label="Invoices count">
                        </div>
                        entries
                    </div>
                    <div class="ms-auto text-secondary">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Tanggal</th>
                            <th>Terlambat Yang Ke</th> <!-- Kolom untuk menampilkan total keterlambatan -->
                            <!-- Kolom-kolom lainnya -->
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalKeterlambatan = []; // Inisialisasi array untuk menyimpan total keterlambatan
                        @endphp
                        @foreach ($terlambats as $terlambat)
                            @php
                                // Periksa apakah Nama sudah ada dalam array totalKeterlambatan
                                if (!isset($totalKeterlambatan[$terlambat->karyawan->nama])) {
                                    $totalKeterlambatan[$terlambat->karyawan->nama] = 0;
                                }
                                $totalKeterlambatan[$terlambat->karyawan->nama]++;
                            @endphp
                            <tr>
                                <td>{{ $terlambat->karyawan->nip }}</td>
                                <td>{{ $terlambat->karyawan->nama }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $terlambat->foto) }}" height="50px" alt="">
                                </td>
                                <td>{{ $terlambat->created_at }}</td>
                                <td>{{ $totalKeterlambatan[$terlambat->karyawan->nama] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
