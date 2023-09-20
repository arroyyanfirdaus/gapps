@extends('templates.default')
@php
    $title = 'Data Karyawan';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('student.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush
@section('content')
    <div class="col-lg">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Bagian</th>
                            <th>Unit Kerja</th>
                            <th>Foto</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->phone_number }}</td>
                                <td>{{ $student->studentClass->name }}</td>
                                <td>{{ $student->studentClass->slug }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $student->photo) }}" height="50px" alt="">
                                </td>

                                <td>
                                    <a href="{{ route('student.edit', $student->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('student.destroy', $student->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
