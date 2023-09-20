<?php

namespace App\Http\Controllers;

use App\Models\Akses;
use App\Models\Terlambat;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlahKaryawanTerlambat = Terlambat::count();
        $jumlahKaryawanKeluarMasuk = Akses::count();
        $jumlahPenerimaGatePass = Data::count();

        return view('dashboard.index', compact('jumlahKaryawanTerlambat', 'jumlahKaryawanKeluarMasuk', 'jumlahPenerimaGatePass'));
    }
}
