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

		$motors = Motor::with('tipe.kategori')->paginate(5);
		
		return view('admin.product.motor.index', compact('title', 'motors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$title = 'Tambah Motor';
		
		$kategoriMotors = \App\Kategori::select('id', 'nama_kategori')->get();
		$tipeMotors = \App\Tipe::select('id', 'nama_tipe')->get();

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
		$request->validate([
			'nama_kategori'		=> 'required',
			'nama_tipe'     	=> 'required',
			'nama_motor'    	=> 'required',
			'harga_otr'    		=> 'required|integer',
			'thumbnail'				=> 'required|mimes:png,jpg,jpeg|max:3048',
			'upload_img'			=> 'required',
			'upload_img.*'		=> 'image|mimes:png,jpg,jpeg|max:3048',
			
		]);

		// lakukan looping untuk menyimpan value didalam variable array $warna[]
		foreach ($request->warna as $warna) {
			$warnaArray = explode(",", $warna);
		}

		// Multiple upload gambar atau foto
		if ($request->hasFile('upload_img')) {

			// lakukan looping untuk menyimpan value didalam variable array $image[]
			foreach($request->file('upload_img') as $image)
			{
				// rubah nama file dengan nama random maksimal 8 karakter
				$imageName = Str::random(8). '.' .$image->getClientOriginalExtension();

				// simpan path folder didalam variable $path
				$imagePath = public_path().'/img-products';

				// pindahkan file kedalam folder public
				$image->move($imagePath, $imageName);
				
				// simpan file image yang sudah dirubah namanya kedalam variable array $img[]
				$images[] = $imageName;
			}
		}

		// Upload thumbnail
		if ($request->hasFIle('thumbnail')) {
			$thumbnailName = Str::random(8). '.' .$request->thumbnail->getClientOriginalExtension();
			$thumbnailPath = public_path().'/img-products';
			$request->thumbnail->move($thumbnailPath, $thumbnailName);
		}
		
		$motor = Motor::create([
			'kategori_id'   => $request->nama_kategori,
			'tipe_id'       => $request->nama_tipe,
			'nama_motor'    => $request->nama_motor,
			'slug'          => str::slug($request->nama_motor, '-'),
			'thumbnail'	    => $thumbnailName,
			'images'	    	=> json_encode($images),
			'warna'		    	=> json_encode($warnaArray),
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
