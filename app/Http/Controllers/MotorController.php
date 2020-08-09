<?php

namespace App\Http\Controllers;

use App\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard Motor';

        $Motors = Motor::all();

        return view('admin.product.motor', compact('title', 'Motors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Dashboard Tambah Motor';
        
        $tipeMotors = \App\Tipe::all('id', 'nama_tipe');
        $kategoriMotors = \App\Kategori::all();

        return view('admin.product.create_motor', compact('title', 'tipeMotors', 'kategoriMotors'));
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
            'nama_tipe'     => 'required',
            'nama_kategori' => 'required',
            'harga_otr'     => 'required',
        ]);

        Motor::create([
            'tipe_id'       => $request->nama_tipe,
            'kategori_id'   => $request->nama_kategori,
            'nama_motor'    => $request->nama_motor,
            'slug'          => str::slug($request->nama_motor, '-'),
            'harga_otr'     => $request->harga_otr,
            'warna'         => $request->warna,
            'cc_motor'      => $request->cc_motor,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect('/products/motor')->with('status', 'Motor Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Motor $motor)
    {
        $title = 'Dashboard Edit Motor';
        
        $tipeMotors = \App\Tipe::all('id', 'nama_tipe');
        $kategoriMotors = \App\Kategori::all();

        return view('admin.product.update_motor', compact('title', 'tipeMotors', 'kategoriMotors', 'motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'nama_tipe'     => 'required',
            'nama_kategori' => 'required',
            'nama_motor'    => 'required',
            'harga_otr'     => 'required',
        ]);

        $motor->update([
            'tipe_id'       => $request->nama_tipe,
            'kategori_id'   => $request->nama_kategori,
            'nama_motor'    => $request->nama_motor,
            'slug'          => Str::slug($request->nama_motor),
            'harga_otr'     => $request->harga_otr,
            'warna'         => $request->warna,
            'cc_motor'      => $request->cc_motor,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect('products/motor')->with('status', 'Motor Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
