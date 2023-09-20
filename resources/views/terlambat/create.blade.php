@extends('templates.default')
@php
    $title = 'Tambah Data Karyawan Terlambat';
    $preTitle = 'Tambah Data';
@endphp
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <form action="{{ route('terlambat.store') }}" class="" method="post" enctype="multipart/form-data">
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
                        <label class="form-label">Foto</label>
                        <input type="file" name="foto" value="{{ old('foto') }}"
                            class="form-control @error('foto') is-invalid @enderror" placeholder="Unggah Foto" />
                        @error('foto')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    @endsection
