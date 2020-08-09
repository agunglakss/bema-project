<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $fillable = ['kategori_id', 'nama_tipe', 'slug'];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }

    public function motors()
    {
        return $this->hasMany('App\Motor');
    }
}
