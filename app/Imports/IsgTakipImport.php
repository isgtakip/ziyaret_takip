<?php

namespace App\Imports;

use App\Models\IsgTakip;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;



class IsgTakipImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct()
    {
        IsgTakip::truncate();
    }



    public function model(array $row)
    {
        return new IsgTakip([
            //
            'tc'     => $row[1],
            'ad_soyad'    => $row[2],
            'gorev_turu' => $row[3],
            'personel_kategori' => $row[4],
            'aylik_calisma_suresi' => $row[10],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
