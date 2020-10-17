<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Motor;

class HomeController extends Controller
{
    public function index()
    {
        // get new all motor
        $AllMotors = Motor::with(['tipe', 'pricelists' => function($query) { $query->orderBy('diskon'); }])->orderBy('created_at', 'desc')->take(4)->get();
        
        // get motor by kategori motor matic
        $motorMatics = Kategori::where('slug', 'motor-matic')
                    ->with(['tipes', 'motors' => function($query) {
                        $query->with(['pricelists' => function($query) { $query->orderBy('diskon'); }])->orderBy('created_at', 'desc')->take(4);}])->get();
        
        // get motor by kategori motor bebek
        $motorBebeks = Kategori::where('slug', 'motor-bebek')
                    ->with(['tipes', 'motors' => function($query) {
                        $query->with(['pricelists' => function($query) { $query->orderBy('diskon');}])->orderBy('created_at', 'desc')->take(4);}])->get();
        
        // get motor by kategori motor sport
        $motorSports = Kategori::where('slug', 'motor-sport')
                    ->with(['tipes', 'motors' => function($query) {
                        $query->with(['pricelists' => function($query) { $query->orderBy('diskon');}])->orderBy('created_at', 'desc')->take(4);}])->get();

        // banner
        $banners = \App\Banner::select('image', 'link')->where('status', '1')->get();

        return view('user.home.index', compact('AllMotors', 'motorMatics', 'motorBebeks', 'motorSports', 'banners'));
    }
}
