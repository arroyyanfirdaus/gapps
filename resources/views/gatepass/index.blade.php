@extends('templates.default')
@php
    $title = 'Data Penerima GatePass';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('gatepass.create') }}" class="btn btn-primary">Tambah Data Gatepass</a>
@endpush
@section('content')
    <div class="col-lg">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Sub/Bag</th>
                            <th>Jenis Kendaraan</th>
                            <th>Foto</th>
                            <th>laporan</th>
                            <th>Tanggal & Jam</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $item->karyawan->nip }}</td> --}}
                                <td>{{ $item->karyawan->nip }}</td>
                                <td>{{ $item->karyawan->nama }}</td>
                                <td>{{ $item->sub_bag }}</td>
                                <td>{{ $item->jenis_kendaraan }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->lampiran) }}" height="76px" alt="">
                                </td>

                                <td>{{ $item->laporan }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    {{-- <a href="{{ route('data.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                                    <!-- Tambahkan tombol Hapus jika diperlukan -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#namaSearch').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();
                $('#selectKaryawan option').each(function() {
                    var optionText = $(this).text().toLowerCase();
                    if (optionText.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            $(document).ready(function() {
                $('.select2').select2({
                    theme: 'bootstrap4',
                    placeholder: '-- Pilih Disini --'
                });
            });
        });
    </script>
@endsection



{{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Penerima GatePass
    </button> --}}

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">GatePass</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('gatepass.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <label class="form-label">Nama</label>
                        <select class="select2 form-control" name="nip" id="selectKaryawan">
                            <option value class=""></option>
                            @foreach ($data as $class)
                                @if ($class->nama != 'cek' && $class->nip != 0)
                                    <option value="{{ $class->id }}">{{ $class->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-body">
                        <label for="sub_bag">Sub/Bag</label>
                        <input type="text" name="sub_bag" class="form-control" required>
                    </div>
                    <div class="modal-body">
                        <label for="jenis_kendaraan">Jenis Kendaraan</label>
                        <input type="text" name="jenis_kendaraan" class="form-control" required>
                    </div>
                    <div class="modal-body">
                        <label for="jenis_kendaraan">Laporan </label>
                        <input type="text" name="laporan" class="form-control" required>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Foto</label>
                        <input type="file" name="lampiran" value="{{ old('photo') }}"
                            class="form-control @error('lampiran')
                            is-invalid
                        @enderror"
                            placeholder="Tulis Nama" />
                        @error('photo')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
