@extends('templates.default')
@php
    $title = 'Tambah Data Akses';
    $preTitle = 'Tambah Data';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('akses.store') }}" class="" method="post" enctype="multipart/form-data">
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

                <div class="mb-3">
                    <label for="agenda_kegiatan" class="form-label">Agenda Kegiatan</label>
                    <input type="text" name="agenda_kegiatan" id="agenda_kegiatan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
