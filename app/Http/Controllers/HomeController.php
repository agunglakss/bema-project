<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;

class HomeController extends Controller
{
    public function index()
    {
        // Get All Motor
        $AllMotors = Motor::orderBy('created_at', 'desc')->take(4)->get();
        
        // Get Motor By Category
        $AllMotorByCategories = \App\Kategori::with('motors')->orderBy('created_at', 'desc')->take(4)->get();

        // banner
        $banners = \App\Banner::select('image', 'link')->where('status', '1')->get();

        return view('user.home.index', compact('AllMotors', 'AllMotorByCategories', 'banners'));
    }
}
