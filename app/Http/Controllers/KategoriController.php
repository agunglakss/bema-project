<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Daftar Kategori Motor';

        $kategoriMotors = Kategori::orderBy('nama_Kategori')->paginate(5);

        return view('admin.product.kategori.index', compact('title', 'kategoriMotors',));
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori Motor',
        ];

        return view('admin.product.kategori.create', $data);
    }

    public function store(Request $request)
    {
		$request->validate([
			'nama_kategori' => 'required',
		]);

		Kategori::create([
			'nama_kategori' => $request->nama_kategori,
			'slug'          => Str::slug($request->nama_kategori, '-'),
		]);

		return redirect('/kategori-motor')->with('status', 'Kategori Motor Berhasil Ditambahkan!');
    }

    public function show(Kategori $kategori)
    {
    
    }

    public function edit(Kategori $kategori)
    {
        $data = [
            'title'     => 'Edit Kategori Motor',
            'kategori'  => $kategori,
        ];

        return view('admin.product.kategori.edit', $data);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug'          => Str::slug($request->nama_kategori, '-'),
        ]);

        return redirect('/kategori-motor')->with('status', 'Kategori Motor Berhasil Diubah!');
    }

    public function destroy($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        $kategori->delete();

        return redirect('/kategori-motor')->with('status', 'Kategori Motor Berhasil Dihapus');
    }
}
