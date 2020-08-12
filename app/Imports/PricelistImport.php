<?php

namespace App\Imports;

use App\Pricelist;
use Maatwebsite\Excel\Concerns\ToModel;

class PricelistImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pricelist([
            'motor_id'  => $row[1],
            'uang_muka' => $row[2],
            'diskon'    => $row[3],
            'bulan_11'  => $row[4],
            'bulan_17'  => $row[5],
            'bulan_23'  => $row[6],
            'bulan_27'  => $row[7],
            'bulan_29'  => $row[8],
            'bulan_33'  => $row[9],
            'bulan_35'  => $row[10],
        ]);
    }
}
