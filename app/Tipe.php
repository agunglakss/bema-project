<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $fillable = ['nama_tipe', 'slug'];

    public function ketegoris()
    {
        return $this->hasMany('App\Kategori');
    }

    public function motors()
    {
        return $this->hasManyThrough('App\Motor', 'App\Kategori');
    }
}
