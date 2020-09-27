<?php

namespace App\Imports;

use App\Models\Med;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MedsImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Med([
            'name' => $row['generic'],
            'package' => $row['packagedescription'],
            'price' => $row['price']
        ]);
    }

    public function batchSize(): int 
    {
        return 1000;
    }
}
