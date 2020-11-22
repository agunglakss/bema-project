<?php

namespace App\Http\Controllers;
use App\About_us;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = About_us::first();
        
        return view('user.about-us', compact('aboutUs'));
    }

    public function edit() 
    {
        $title = "Tentang Kami";
        $aboutUs = About_us::first();
        
        return view('admin.about_us.edit', compact('title', 'aboutUs'));
    }

    public function update(Request $request, About_us $about_us)
    {
        $title = "Tentang Kami";

        $aboutUs =  About_us::where('id', $request->id)->first();
        
        $aboutUs->update([
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/tentang-kami/edit')->with('status', 'Tentang kami berhasil diubah');
    } 
}
