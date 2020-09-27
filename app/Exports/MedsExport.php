<?php

namespace App\Exports;

use App\Models\Med;
use Maatwebsite\Excel\Concerns\FromCollection;

class MedsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Med::all();
    }
}
