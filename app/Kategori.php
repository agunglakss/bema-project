<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['tipe_id', 'nama_kategori', 'slug'];

    public function tipe()
    {
        return $this->belongsTo('App\Tipe');
    }

    public function motors()
    {
        return $this->hasMany('App\Motor');
    }
}
