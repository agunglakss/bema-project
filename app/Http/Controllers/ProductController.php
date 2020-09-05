<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;
use App\Kategori;
use App\Tipe;
use App\Pricelist;

class ProductController extends Controller
{
	// Index
	public function index()
	{
		$Motors = Motor::all();

		return view('user.product.index', compact('Motors'));
	}

	// menampilkan data motor berdasarkan motor_id
	public function show(Kategori $kategori, Tipe $tipe, Motor $motor)
	{

		$pricelists = Pricelist::where('motor_id', $motor->id)->get();

		return view('user.product.show', compact('motor', 'pricelists'));
	}


	public function getMotorByCategory(Kategori $kategori)
	{  
		$Motors = $kategori->motors;

		return view('user.product.index', compact('kategori', 'Motors'));
	}

	public function getMotorByType(Kategori $kategori, Tipe $tipe)
	{
		$Motors = $tipe->motors;

		return view('user.product.index', compact('Motors', 'tipe', 'kategori'));
	}

	public function showPricelistByUangMuka($motor_id, $uang_muka)
	{
		$pricelistByUangMuka = Pricelist::where(['motor_id' => $motor_id, 'uang_muka' => $uang_muka])->get();
		
		return $pricelistByUangMuka;
	}

}
