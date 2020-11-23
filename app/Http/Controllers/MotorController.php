<?php

namespace App\Http\Controllers;

use Storage;
use App\Motor;
use App\Pricelist;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class MotorController extends Controller
{
	public function index()
	{
		$title = 'Daftar Motor';

		$motors = Motor::with('tipe.kategori')->paginate(5);
		
		return view('admin.product.motor.index', compact('title', 'motors'));
	}

	public function create()
	{
		$title = 'Tambah Motor';
		
		$kategoriMotors = \App\Kategori::select('id', 'nama_kategori')->get();
		$tipeMotors = \App\Tipe::select('id', 'nama_tipe')->get();

		return view('admin.product.motor.create', compact('title', 'kategoriMotors', 'tipeMotors'));
	}

	public function store(Request $request)
	{	
		$request->validate([
			'nama_kategori'		=> 'required',
			'nama_tipe'     	=> 'required',
			'nama_motor'    	=> 'required|unique:motors',
			'harga_otr'    		=> 'required|integer',
			'thumbnail'			=> 'required|mimes:png,jpg,jpeg|max:3048',
			'upload_img'		=> 'required',
			'upload_img.*'		=> 'image|mimes:png,jpg,jpeg|max:3048',
		]);

		// lakukan looping untuk menyimpan value didalam variable array $warna[]
		foreach ($request->warna as $warna) {
			$warnaArray = explode(",", strtolower($warna));
		}

		// Multiple upload gambar atau foto
		if ($request->hasFile('upload_img')) {

			// lakukan looping untuk menyimpan value didalam variable array $image[]
			foreach($request->file('upload_img') as $image)
			{
				// rubah nama file dengan nama random maksimal 8 karakter
				$imageWithExtension = Str::random(8).'.'.$image->getClientOriginalExtension();

				// pindahkan image yang sudah dirumah namanya kedalam folder storage/app/public/product-image
				Storage::putFileAs('public/product-image', $image, $imageWithExtension);
				
				// tampung file image yang sudah dirubah namanya kedalam variable array $images[]
				$images[] = $imageWithExtension;
			}
		}

		if($request->hasFile('thumbnail')) {
            $imageWithExtension = Str::random(8).'.'.$request->file('thumbnail')->getClientOriginalExtension();
            Storage::putFileAs('public/thumbnail', $request->file('thumbnail'), $imageWithExtension);
        }
		
		$motor = Motor::create([
			'kategori_id'   => $request->nama_kategori,
			'tipe_id'       => $request->nama_tipe,
			'nama_motor'    => $request->nama_motor,
			'slug'          => str::slug($request->nama_motor, '-'),
			'thumbnail'	    => $imageWithExtension,
			'images'	   	=> json_encode($images),
			'warna'		    => json_encode($warnaArray),
			'harga_otr'     => $request->harga_otr,
			'cc_motor'      => $request->cc_motor,
			'status'		=> $request->status,
			'deskripsi'     => $request->deskripsi,
		]);
		
		return redirect('/motor')->with('status', 'Motor Berhasil Ditambahkan!');
	}

	public function show($slug)
	{
		$title = "Detail Motor";

		$detailMotor = Motor::with('pricelists', 'tipe')->where('slug', $slug)->first();

		$pricelist = Pricelist::where('motor_id', $detailMotor->id)->first();

		return view('admin.product.motor.show', compact('title', 'detailMotor', 'pricelist'));
	}

	
	public function edit(Motor $motor)
	{
		$title = 'Edit Motor';

		$kategoriMotors = \App\Kategori::all('id', 'nama_kategori');
		$tipeMotors = \App\Tipe::all('id', 'nama_tipe');

		return view('admin.product.motor.edit', compact('title', 'kategoriMotors', 'tipeMotors', 'motor'));
	}

	public function update(Request $request, Motor $motor)
	{
		//dd($request);
		$request->validate([
			'nama_kategori' => 'required',
			'nama_tipe'     => 'required',
			'nama_motor'    => 'required',
			'harga_otr'     => 'required',
		]);
		
		// lakukan looping untuk menyimpan value didalam variable array $warna[]
		foreach ($request->warna as $warna) {
			$warnaArray = explode(",", strtolower($warna));
		}

		$motor->update([
			'kategori_id'   => $request->nama_kategori,
			'tipe_id'       => $request->nama_tipe,
			'nama_motor'    => $request->nama_motor,
			'slug'          => Str::slug($request->nama_motor),
			'warna'		    => json_encode($warnaArray),
			'harga_otr'     => $request->harga_otr,
			'cc_motor'      => $request->cc_motor,
			'status'		=> $request->status,
			'deskripsi'     => $request->deskripsi,
		]);

		return redirect('/motor')->with('status', 'Motor Berhasil Diubah!');
	}

	public function destroy($slug)
	{
		// cek motor berdasarkan slug motor
		$motor = Motor::where('slug', $slug)->first();

		// hapus image di dalam folder storage/app/public/thumbnail
		Storage::disk('public')->delete('thumbnail/'.$motor->thumbnail);

		// lakukan looping untuk menghapus setiap image
		// lalu hapus image di dalam folder storage/app/public/product-image
		foreach(json_decode($motor->images) as $image) {
			Storage::disk('public')->delete('product-image/'.$image);
		}

		// delete data di table motors
		$motor->delete();
	
		return redirect('/motor')->with('status', 'Motor Berhasil Dihapus!');
	}
}
