<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;
use App\Kategori;
use App\Tipe;

class ProductController extends Controller
{
	public function index()
	{
		$Motors = Motor::all();

		return view('user.product.index', compact('Motors'));
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

}
