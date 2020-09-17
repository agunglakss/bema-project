<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Banner;
use App\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Daftar Banner Promo";

        $banners = Banner::orderBy('created_at', 'desc')->paginate(5);
        
        return view('admin.banner.index', compact('title', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Banner Promo";

        return view('admin.banner.create', compact('title'));
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
    public function edit($id)
    {
        $title = "Edit Banner Promo";
        $banner = Banner::findOrFail($id);
        
        return view('admin.banner.edit', compact('title', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        
        if($request->hasFile('image')) {
            $imageWithExtension = \Str::random(8).'.'.$request->file('image')->getClientOriginalExtension();
            Storage::putFileAs('public/banner-image', $request->file('image'), $imageWithExtension);
            Storage::disk('local')->delete('public/banner-image/'.$banner->image);
            $banner->image = $imageWithExtension;
        }

        $banner->link = $request->link;
        $banner->status = $request->status;
        
        $banner->save();
        return redirect('/banners')->with('status', 'Banner Berhasil Diubah'); 
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