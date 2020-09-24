<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'pricelist_id',
        'tenor',
        'warna',
        'nama',
        'alamat',
        'nomor_telp',
    ];

    public function pricelist() {
        return $this->belongsTo('App\Pricelist');
    }

    public function motor() {
        return $this->belongsTo('App\Motor');
    }
}
