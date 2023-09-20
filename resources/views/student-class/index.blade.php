@extends('templates.default')
@php
    $title = 'Unit Kerja';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('student-classes.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush
@section('content')
    <div class="col-lg">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Unit Kerja</th>
                            <th>Slug</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>{{ $class->name }}</td>
                                <td>{{ $class->slug }}</td>



                                <td>
                                    <a href="{{ route('student-classes.edit', $class->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('student-classes.destroy', $class->id) }}" method="post">
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
