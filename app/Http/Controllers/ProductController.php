<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pricelist;
use App\Kategori;
use App\Motor;
use App\Tipe;

class ProductController extends Controller
{
	// Index
	public function index()
	{
		$Motors = Motor::with(['tipe', 'pricelists' => function($query) { $query->orderBy('diskon'); }])->orderBy('status', 'desc')->paginate(9);
		return view('user.product.index', compact('Motors'));
	}


	// menampilkan data motor berdasarkan kategori motor
	public function getMotorByCategory(Kategori $kategori)
	{
		$Motors = $kategori->motors()->orderBy('status', 'desc')->paginate(9);
		return view('user.product.index', compact('kategori', 'Motors'));
	}

	// menampilkan data motor berdasarkan tipe motor
	public function getMotorByType(Kategori $kategori, Tipe $tipe)
	{
		$Motors = $tipe->motors()->orderBy('status', 'desc')->paginate(9);
		return view('user.product.index', compact('Motors', 'tipe', 'kategori'));
	}

	// menampilkan data motor berdasarkan motor_id
	public function show(Kategori $kategori, Tipe $tipe, Motor $motor)
	{
		$pricelists = Pricelist::where('motor_id', $motor->id)->get();
		return view('user.product.show', compact('motor', 'pricelists'));
	}

	// menampilkan detail daftar harga motor berdasarkan uang muka/DP
	public function showPricelistByUangMuka($motor_id, $uang_muka)
	{
        return Pricelist::where(['motor_id' => $motor_id, 'uang_muka' => $uang_muka])->get();
	}

	// fungsi searching motor berdasarkan nama motor
	public function search(Request $request)
	{
		if($request->motor == "") return redirect('/');
		$namaMotor = $request->motor;

		$Motors = Motor::where('nama_motor','like',"%".$namaMotor."%")->paginate(9);

		return view('user.product.index', compact('Motors'));
	}
}
