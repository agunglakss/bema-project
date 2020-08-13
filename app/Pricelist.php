<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    protected $fillable = [
        'motor_id',
        'uang_muka',
        'diskon',
        'bulan_11',
        'bulan_17',
        'bulan_23',
        'bulan_27',
        'bulan_29',
        'bulan_33',
        'bulan_35',
    ];

    public function motor()
    {
        return $this->belongsTo('\App\Motor');
    }
}
