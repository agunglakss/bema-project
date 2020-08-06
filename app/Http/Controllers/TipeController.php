<?php

namespace App\Http\Controllers;

use App\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'      => 'Dashboard Tipe Motor',
            'tipeMotors' => Tipe::orderBy('nama_tipe')->get(),
        ];    
        return view('admin.product.tipe', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Dashboard Tambah Tipe Motor',
        ];

        return view('admin.product.create_tipe', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tipe' => 'required',
        ]);

        Tipe::create([
            'nama_tipe' => $request->nama_tipe,
            'slug'      => Str::slug($request->nama_tipe, '-'),
        ]);

        return redirect('/products/tipe-motor')->with('status', 'Tipe Motor Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function show(Tipe $tipe)
    {
        $data = [
            'title' => 'Dashboard Detail Tipe Motor',
            'tipe'  => $tipe,
        ];

        return $this->view('admin.product.detail-tipe', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipe $tipe)
    {
        $data = [
            'title' => 'Dashboard Update Tipe Motor',
            'tipe'  => $tipe,
        ];

        return view('admin.product.update_tipe', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipe $tipe)
    {
        $request->validate([
            'nama_tipe' => 'required',
        ]);

        $tipe->update([
                'nama_tipe' => $request->nama_tipe,
                'slug'      => Str::slug($request->nama_tipe, '-'),
            ]);

        return redirect('products/tipe-motor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipe $tipe)
    {
        //
    }
}
