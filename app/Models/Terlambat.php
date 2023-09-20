<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terlambat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'id_karyawan',
        'nip',
        'foto',
    ];

    function karyawan()
    {
        return $this->hasOne('App\Models\Karyawan', 'id', 'id_karyawan');
    }

    public static function totalKeterlambatanByNIP($nip)
    {
        return self::where('id_karyawan', $nip)->count();
    }
}
