@extends('templates.default')
@php
    $title = 'Tambah Data Akses';
    $preTitle = 'Tambah Data';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h2>Tambah Data</h2>
                <form action="{{ route('gatepass.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <select class="select2 form-control" name="nip" id="selectKaryawan">
                            <option value class=""></option>
                            @foreach ($karyawan as $class)
                                @if ($class->nama != 'cek' && $class->nip != 0)
                                    <option value="{{ $class->id }}">{{ $class->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sub_bag" class="form-label">Sub/Bag</label>
                        <input type="text" name="sub_bag" id="sub_bag" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenis_kendaraan">Jenis Kendaraan</label>
                        <input type="text" name="jenis_kendaraan" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="lampiran">Lampiran (Foto)</label>
                        <input type="file" name="lampiran" class="form-control-file" required>
                    </div>
                    <div class="mb-3">
                        <label for="laporan" class="form-label">Laporan</label>
                        <input type="text" name="laporan" id="laporan" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
