@extends('templates.default')
@php
    $title = 'Edit Data Akses';
    $preTitle = 'Edit Data';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('akses.update', $akses->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="approval" class="form-label">Approval</label>
                    <select name="approval" id="approval" class="form-select">
                        <option value="Pending" @if ($akses->approval == 'Pending') selected @endif>Pending</option>
                        <option value="Disetujui" @if ($akses->approval == 'Disetujui') selected @endif>Disetujui</option>
                        <option value="Ditolak" @if ($akses->approval == 'Ditolak') selected @endif>Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
