<?php

namespace App\Http\Controllers;

use App\Motor;
use Illuminate\Support\Facades\Input;
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
		$title = 'Daftar Motor';

		$Motors = Motor::paginate(5);

		return view('admin.product.motor.index', compact('title', 'Motors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$title = 'Tambah Motor';
		
		$kategoriMotors = \App\Kategori::all('id', 'nama_kategori');
		$tipeMotors = \App\Tipe::all('id', 'nama_tipe');

		return view('admin.product.motor.create', compact('title', 'kategoriMotors', 'tipeMotors'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		foreach($request->warna as $warna)
		{
			$data_warna = $warna;
		}

		$request->validate([
			'nama_kategori'		=> 'required',
				'nama_tipe'     	=> 'required',
				'nama_motor'    	=> 'required',
				'harga_otr'    		=> 'required|integer',
			'upload_thumbnail'	=> 'required|image|mimes:jpeg,png,jpg|max:2048',
		]);

		// Cek jika mempunyai file poto
		if ($request->hasFile('upload_thumbnail')) {

			// simpan poto didalam variable $photo
			$photo = $request->file('upload_thumbnail');

			// rubah nama file dengan nama random maksimal 8 karakter
			$thumbnail_name = Str::random(8). '.' .$photo->getClientOriginalExtension();

			// simpan path folder didalam variable $path
			$path = public_path().'/img-products';

			// pindahkan file kedalam folder public
			$photo->move($path, $thumbnail_name);
		}

		$motor = Motor::create([
			'kategori_id'   => $request->nama_kategori,
			'tipe_id'       => $request->nama_tipe,
			'nama_motor'    => $request->nama_motor,
			'slug'          => str::slug($request->nama_motor, '-'),
			'thumbnail'	    => $thumbnail_name,
			'warna'		    => $data_warna,
			'harga_otr'     => $request->harga_otr,
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
		$title = 'Edit Motor';

		$kategoriMotors = \App\Kategori::all('id', 'nama_kategori');
		$tipeMotors = \App\Tipe::all('id', 'nama_tipe');

		return view('admin.product.motor.edit', compact('title', 'kategoriMotors', 'tipeMotors', 'motor'));
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
			'nama_kategori' => 'required',
			'nama_tipe'     => 'required',
			'nama_motor'    => 'required',
			'harga_otr'     => 'required',
		]);

		$motor->update([
			'kategori_id'   => $request->nama_kategori,
			'tipe_id'       => $request->nama_tipe,
			'nama_motor'    => $request->nama_motor,
			'slug'          => Str::slug($request->nama_motor),
			'harga_otr'     => $request->harga_otr,
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
