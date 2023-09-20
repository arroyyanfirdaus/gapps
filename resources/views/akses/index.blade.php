@extends('templates.default')
@php
    $title = 'Data Akses';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('akses.create') }}" class="btn btn-primary">Tambah Data Akses</a>
@endpush

@section('content')
    <div class="col-lg">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No #</th>
                            <th>Nip</th>
                            <th>Nama Lengkap</th>
                            <th>Sub/Bag</th>
                            <th>Agenda Kegiatan</th>
                            <th>Approval</th>
                            <th>Tanggal & Jam</th>
                            <th>Jam Approve</th>
                            <th>Keluar Masuk Yang Ke</th> <!-- Tambahkan kolom total -->
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalKeluarMasuk = []; // Inisialisasi array untuk menyimpan total keluar masuk
                        @endphp

                        @foreach ($akses as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->karyawan->nip }}</td>
                                <td>{{ $data->karyawan->nama }}</td>
                                <td>{{ $data->sub_bag }}</td>
                                <td>{{ $data->agenda_kegiatan }}</td>
                                <td>
                                    <form action="{{ route('akses.update', $data->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="input-group">
                                            <select name="approval" class="form-select">
                                                <option value="Pending"
                                                    {{ $data->approval == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Disetujui"
                                                    {{ $data->approval == 'Disetujui' ? 'selected' : '' }}>Disetujui
                                                </option>
                                                <option value="Ditolak"
                                                    {{ $data->approval == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        </div>
                                    </form>
                                </td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    @if ($data->approval == 'Disetujui')
                                        {{ $data->updated_at }}
                                    @else
                                        <!-- Tampilkan pesan atau isi lain jika status bukan "Pending" -->
                                    @endif
                                </td>
                                <td>
                                    @php
                                        // Hitung total keluar masuk yang ke
                                        $total = $key + 1;
                                        // Tambahkan total ke array
                                        $totalKeluarMasuk[$data->karyawan->nama] = $total;
                                        // Tampilkan total pada kolom Total Keluar Masuk
                                        echo $total;
                                    @endphp
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
