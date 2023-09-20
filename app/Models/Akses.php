<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    protected $table = 'akses'; // Nama tabel dalam database

    protected $fillable = [
        'id_karyawan',
        'sub_bag',
        'agenda_kegiatan',
        'approval'
    ];


    function karyawan()
    {
        return $this->hasOne('App\Models\Karyawan', 'id', 'id_karyawan');
    }
    // Tambahkan definisi relasi jika diperlukan

    public static function totalKeluarMasuk($nama)
    {
        // Hitung total keluar masuk untuk karyawan dengan nama tertentu
        return self::where('id_karyawan', $nama)->count();
    }
}
