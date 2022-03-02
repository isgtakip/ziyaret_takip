<?php

namespace App\Exports;

use App\Models\IsgTakip;
use Maatwebsite\Excel\Concerns\FromCollection;


class IsgTakipExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IsgTakip::all();
    }
}
