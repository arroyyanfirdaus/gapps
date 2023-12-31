@extends('templates.default')
@php
    $title = 'Tambah Data Karyawan';
    $preTitle = 'Tambah Data';
@endphp
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('student.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        placeholder="Tulis Nama" />
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="form-control @error('address')
                    is-invalid
                @enderror"
                        name="example-text-input" placeholder="Tulis Alamat" />
                    @error('address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Kontak</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                        class="form-control @error('phone_number')
                    is-invalid
                @enderror"
                        name="example-text-input" placeholder="Masukan No Kontak" />
                    @error('phone_number')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Bagian</label>
                    <select name="student_class_id" id="" class="form-control">
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                    @error('class')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Unit Kerja</label>
                    <select name="student_class_id" id="" class="form-control">
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->slug }}</option>
                        @endforeach
                    </select>
                    @error('class')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="photo" value="{{ old('photo') }}"
                        class="form-control @error('photo')
                        is-invalid
                    @enderror"
                        placeholder="Tulis Nama" />
                    @error('photo')
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
