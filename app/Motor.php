<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = ['tipe_id', 'kategori_id', 'nama_motor', 'slug', 'thumbnail', 'images', 'warna', 'harga_otr', 'cc_motor', 'status', 'deskripsi'];

    public function tipe()
    {
        return $this->belongsTo('App\Tipe');
    }

    public function pricelists()
    {
        return $this->hasMany('App\Pricelist');
    }

    public function orders() {
        return $this->hasManyThrough('App\Order', 'App\Pricelist');
    }
}
