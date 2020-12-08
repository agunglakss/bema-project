<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $title = "Daftar Testimonial";

        $testimonials = Testimonial::paginate(5);
        return view('admin.testimonial.index', compact('title', 'testimonials'));
    }

    public function gallery()
    {
        $title = "Testimoni Pelanggan - Kredit Motor Honda Murah | Spesialis Kredit Motor Honda";

        $testimonials = Testimonial::all();
        return view('user.testimoni.index', compact('title', 'testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'     => 'required|mimes:png,jpg,jpeg|max:3048',
        ]);

        if($request->hasFile('image')) {
            $imageWithExtension = \Str::random(8).'.'.$request->file('image')->getClientOriginalExtension();
            Storage::putFileAs('public/testimonial', $request->file('image'), $imageWithExtension);
        }

        Testimonial::create([
            'image'          => $imageWithExtension,
        ]);
        return redirect('/testimonial')->with('status', 'Testimoni Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        // cek motor berdasarkan slug motor
		$testimonial = Testimonial::where('id', $id)->first();

		// hapus image di dalam folder storage/app/public/thumbnail
        Storage::disk('public')->delete('testimonial/'.$testimonial->image);
        
        $testimonial->delete();
        return redirect('/testimonial')->with('status', 'Testimonial Berhasil Dihapus');
    }
}
