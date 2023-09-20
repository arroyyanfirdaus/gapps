<?php


namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $data = Data::orderBy('created_at', 'desc')
            ->with('karyawan')
            ->get();

        // dd($terlambats);

        return view('gatepass.index', compact('data'));
    }

    public function create()
    {
        $karyawan = Karyawan::orderBy('created_at', 'desc')->get();
        return view('gatepass.create', compact('karyawan'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'nip' => 'required',
            'sub_bag' => 'required',
            'jenis_kendaraan' => 'required',
            'lampiran' => 'image',
            'laporan' => 'required',
        ]);

        $fotoPath = $request->file('lampiran')->store('data_photos');

        Data::create([

            'id_karyawan' => $request->input('nip'),
            'sub_bag' => $request->input('sub_bag'),
            'jenis_kendaraan' => $request->input('jenis_kendaraan'),
            'lampiran' => $fotoPath,
            'laporan' => $request->input('laporan'),
        ]);


        return redirect()->route('gatepass.index')->with('success', 'Data berhasil disimpan.');
    }
}



// public function store(Request $request)
    // {
    //     // Validasi data yang dikirimkan oleh formulir
    //     $validatedData = $request->validate([
    //         'nama_lengkap' => 'required',
    //         'sub_bag' => 'required',
    //         'jenis_kendaraan' => 'required',
    //         'lampiran' => 'image',
    //     ]);

    //     $fotoPath = $request->file('foto')->store('data_photos');
    //     Data::create([
    //         // 'id_karyawan' => $request->input('nip'),
    //         'foto' => $fotoPath,
    //     ]);



    //     // Simpan data ke dalam database
    //     Data::create($validatedData);
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_lengkap' => 'required',
    //         'sub_bag' => 'required',
    //         'jenis_kendaraan' => 'required',
    //         'lampiran' => 'image',
    //         'laporan' => 'required',
    //     ]);

    //     $fotoPath = $request->file('lampiran')->store('data_photos');

    //     Data::create([
    //         // 'id_karyawan' => $request->input('nip'),
    //         'nama_lengkap' => $request->input('nama_lengkap'),
    //         'sub_bag' => $request->input('sub_bag'),
    //         'jenis_kendaraan' => $request->input('jenis_kendaraan'),
    //         'lampiran' => $fotoPath,
    //         'laporan' => $request->input('laporan'),
    //     ]);



    //     return redirect()->route('gatepass.index')->with('success', 'Data berhasil disimpan.');
    // }
