<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;
use App\Order;
use App\Pricelist;

class OrderController extends Controller
{
    public function store(Request $request) 
    {
        $request->validate([
            'pricelist_id'  => 'required',
            'warna'         => 'required',
            'tenor'         => 'required',
            'nama'          => 'required',
            'alamat'        => 'required',
            'nomor_telp'    => 'required',
        ]);

        $pricelist = Pricelist::findOrFail($request->pricelist_id);
        
        Order::create([
            'order_id'      => rand(1, 999).time(),
            'pricelist_id'  => $pricelist->id,
            'warna'         => $request->warna,
            'tenor'         => $request->tenor,
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'nomor_telp'    => $request->nomor_telp,
        ]);

        return redirect('/');
        
    }
}
