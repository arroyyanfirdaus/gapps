<?php

namespace App\Http\Controllers;

use App\Models\Akses;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AksesController extends Controller
{
    public function index(Request $request)
    {
        $akses = Akses::orderBy('created_at', 'desc')
            ->with('karyawan')
            ->get();

        // dd($terlambats);
        return view('akses.index', compact('akses'));
    }

    public function create()
    {
        $karyawan = Karyawan::orderBy('created_at', 'desc')->get();
        return view('akses.create', compact('karyawan'));
    }

    public function store(Request $request)
    {
        // Validasi input data akses
        $request->validate([
            'nip' => 'required',
            'sub_bag' => 'required',
            'agenda_kegiatan' => 'required',
            // 'approval' => 'required',
        ]);

        // Simpan data akses ke dalam database
        Akses::create([
            'id_karyawan' => $request->input('nip'),
            'sub_bag' => $request->input('sub_bag'),
            'agenda_kegiatan' => $request->input('agenda_kegiatan'),
            // 'approval' => $request->input('approval'),

        ]);



        return redirect()->route('akses.index')->with('success', 'Data akses berhasil disimpan.');
    }

    public function edit($id)
    {
        $akses = Akses::findOrFail($id);

        return view('akses.edit', compact('akses'));
    }

    public function update(Request $request, $id)
    {
        $akses = Akses::findOrFail($id);

        // Validasi input data akses
        $request->validate([
            'approval' => 'required',
        ]);

        // Update data approval
        $akses->update([
            'approval' => $request->input('approval'),
        ]);

        return redirect()->route('akses.index')->with('success', 'Data approval berhasil diupdate.');
    }
}
