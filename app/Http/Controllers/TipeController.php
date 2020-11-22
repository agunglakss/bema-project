<?php

namespace App\Http\Controllers;

use App\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class TipeController extends Controller
{
    public function index()
    {
        $title = 'Daftar Tipe Motor';

        $tipeMotors = Tipe::orderBy('nama_tipe')->paginate(5);

        return view('admin.product.tipe.index', compact('title', 'tipeMotors'));
    }

    public function create()
    {
        $title = 'Tambah Tipe Motor';

        $kategoriMotors = \App\Kategori::select('id', 'nama_kategori')->get();

        return view('admin.product.tipe.create', compact('title', 'kategoriMotors',));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori'     => 'required',
            'nama_tipe'         => 'required',
        ]);

        Tipe::create([
            'kategori_id'   => $request->nama_kategori,
            'nama_tipe'     => $request->nama_tipe,
            'slug'          => str::slug($request->nama_tipe, '-'),
        ]);

        return redirect('/tipe-motor')->with('status',  'Tipe Motor Berhasil Ditambahkan!');
    }

    public function show (Tipe $tipe)
    {
        //
    }

    public function edit (Tipe $tipe)
    {
        $title = 'Edit Tipe Motor';
        
        $kategoriMotors = \App\Kategori::select('id', 'nama_kategori')->get();

        return view('admin.product.tipe.edit', compact('title', 'kategoriMotors', 'tipe'));
    }

    public function update(Request $request, Tipe $tipe)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'nama_tipe'     => 'required',
        ]);
		
         $tipe->update([
            'kategori_id'   => $request->nama_kategori,
            'nama_tipe'     => $request->nama_tipe,
            'slug'          => Str::slug($request->nama_tipe),
        ]);

        return redirect('/tipe-motor')->with('status', 'Tipe Motor Berhasil Diubah');
    }

    public function destroy($slug)
    {
        $tipe = Tipe::where('slug', $slug)->first();
        $tipe->delete();

        return redirect('/tipe-motor')->with('status', 'Tipe Motor Berhasil Dihapus');
    }
}
