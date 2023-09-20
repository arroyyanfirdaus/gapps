<?php

namespace App\Imports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // dd($row);
        return new Karyawan([

            'nama'     => $row[0] ?? "cek",
            'nip'    => $row[1] ?? 000,
            'unit_kerja' => $row[2] ?? "cek",

        ]);
    }
}
