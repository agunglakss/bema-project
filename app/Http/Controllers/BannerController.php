<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Banner;
use App\Str;

class BannerController extends Controller
{
    public function index()
    {
        $title = "Daftar Banner Promo";

        $banners = Banner::orderBy('created_at', 'desc')->paginate(5);
        
        return view('admin.banner.index', compact('title', 'banners'));
    }

    public function create()
    {
        $title = "Tambah Banner Promo";

        return view('admin.banner.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'     => 'required|mimes:png,jpg,jpeg|max:3048',
            'status'    => 'required',
            'link'      => 'required',
        ]);
            
        if($request->hasFile('image')) {
            $imageWithExtension = \Str::random(8).'.'.$request->file('image')->getClientOriginalExtension();
            Storage::putFileAs('public/banner-image', $request->file('image'), $imageWithExtension);
        }

        Banner::create([
            'image' => $imageWithExtension,
            'link'  => $request->link,
            'status' => $request->status,
        ]);

        return redirect('/banners')->with('status', 'Banner Berhasil Ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $title = "Edit Banner Promo";
        $banner = Banner::findOrFail($id);
        
        return view('admin.banner.edit', compact('title', 'banner'));
    }

    public function update(Request $request, $id)
    {
        
        $banner = Banner::find($id);
        
        $request->validate([
            'image'     => 'required|mimes:png,jpg,jpeg|max:3048',
            'status'    => 'required',
            'link'      => 'required',
        ]);

        if($request->hasFile('image')) {
            $imageWithExtension = \Str::random(8).'.'.$request->file('image')->getClientOriginalExtension();
            Storage::putFileAs('public/banner-image', $request->file('image'), $imageWithExtension);
            Storage::disk('local')->delete('public/banner-image/'.$banner->image);
            $request->image = $imageWithExtension;
        }

        $banner->update([
            'status'    => $request->status,
            'link'      => $request->link,
            'image'     => $request->image,
        ]);

        return redirect('/banners')->with('status', 'Banner Berhasil Diubah'); 
    }

    public function destroy($id)
    {
        // cari file image yang akan dihapus
        $banner = Banner::find($id);

        // cek jika image tidak kosong
        if(!empty($banner->image)) {

            // hapus image di folder storage
            Storage::disk('local')->delete('public/banner-image/'.$banner->image);
        }
        
        // hapus field didatabase
        Banner::destroy($id);

        return redirect('/banners')->with('status', 'Banner Berhasil Dihapus');
    }
}
