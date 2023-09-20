<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Imports\KaryawanImport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.index', [
            'karyawans' => Karyawan::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Excel::import(new KaryawanImport, $request->file('file'));

        return redirect('/karyawan')->with('success', 'Import Berhasil!');
    }
}
