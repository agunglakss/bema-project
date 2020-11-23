<?php

namespace App\Imports;

use App\Pricelist;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PricelistImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pricelist([
            'motor_id'  => $row['motor_id'],
            'uang_muka' => $row['uang_muka'],
            'diskon'    => $row['diskon'],
            'bulan_11'  => $row['bulan_11'],
            'bulan_17'  => $row['bulan_17'],
            'bulan_23'  => $row['bulan_23'],
            'bulan_27'  => $row['bulan_27'],
            'bulan_29'  => $row['bulan_29'],
            'bulan_33'  => $row['bulan_33'],
            'bulan_35'  => $row['bulan_35'],
            'bulan_47'  => $row['bulan_47'],
            'bulan_59'  => $row['bulan_59']
        ]);
    }
}
