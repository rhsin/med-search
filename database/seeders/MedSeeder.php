<?php

namespace Database\Seeders;

use App\Imports\MedsImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class MedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new MedsImport, 'vaFssPharmPrices.xlsx');
    }
}
