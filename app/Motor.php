<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = ['tipe_id', 'kategori_id', 'nama_motor', 'slug', 'harga_otr', 'warna', 'cc_motor', 'deskripsi'];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }
}
