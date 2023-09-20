<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Terlambat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TerlambatController extends Controller
{
    public function index(Request $request)
    {
        $terlambats = Terlambat::orderBy('created_at', 'desc')
            ->with('karyawan')
            ->get();

        // dd($terlambats);
        return view('terlambat.index', compact('terlambats'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'foto' => 'image',
        ]);

        $fotoPath = $request->file('foto')->store('terlambat_photos');

        Terlambat::create([
            'id_karyawan' => $request->input('nip'),
            'foto' => $fotoPath,
        ]);


        return redirect()->route('terlambat.index')->with('success', 'Data hukuman berhasil disimpan.');
    }

    public function create()
    {
        $karyawan = Karyawan::orderBy('created_at', 'desc')->get();
        return view('terlambat.create', compact('karyawan'));
    }
}
