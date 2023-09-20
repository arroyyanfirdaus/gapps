@extends('templates.default')
@php
    $title = 'Edit Unit Kerja';
    $preTitle = 'UNIT KERJA';
@endphp
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('student-classes.update', $class->id) }}" class="" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        name="example-text-input" placeholder="Tulis Nama" value="{{ old('name') ?? $class->name }}" />
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug"
                        class="form-control @error('slug')
                        is-invalid
                    @enderror"
                        name="example-text-input" placeholder="Slug" value="{{ old('slug') ?? $class->slug }}" />
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
