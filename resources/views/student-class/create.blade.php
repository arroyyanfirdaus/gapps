@extends('templates.default')
@php
    $title = 'Tambah Data Unit Kerja';
    $preTitle = 'Unit Kerja';
@endphp
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('student-classes.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        placeholder="Tulis Nama Kelas" />
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug') }}"
                        class="form-control @error('slug')
                    is-invalid
                @enderror"
                        name="example-text-input" placeholder="Tulis Slug" />
                    @error('slug')
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
