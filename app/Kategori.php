<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori', 'slug'];

    public function tipes()
    {
        return $this->hasMany('App\Tipe');
    }

    public function motors()
    {
        return $this->hasManyThrough('App\Motor', 'App\Tipe');
    }
}
