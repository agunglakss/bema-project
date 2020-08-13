<?php

namespace App\Http\Controllers;

use App\Pricelist;
use Session;
use App\Imports\PricelistImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PricelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Daftar Harga Cicilan Motor";

        $pricelists = Pricelist::all();

        return view('admin.pricelist.index', compact('title', 'pricelists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* judul halaman */
        $title = "Tambah Daftar Harga Cicilan Motor";

        /* ambil data motor dari database, tampung di variable $motors */
        $motors = \App\Motor::all('id', 'nama_motor');

        return view('admin.pricelist.create', compact('title', 'motors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* validasi sebelum mengirimkan request ke database */
        $request->validate([
            'nama_kategori' => 'required',
            'uang_muka' => 'required',
            'bulan_11' => 'required',
            'bulan_17' => 'required',
            'bulan_23' => 'required',
            'bulan_27' => 'required',
            'bulan_29' => 'required',
            'bulan_33' => 'required',
            'bulan_35' => 'required',
        ]);
        
        /* kirim request ke database */
        Pricelist::create([
            'motor_id'  => $request->nama_kategori,
            'uang_muka'  => $request->uang_muka,
            'diskon'  => $request->diskon,
            'bulan_11'  => $request->bulan_11,
            'bulan_17'  => $request->bulan_17,
            'bulan_23'  => $request->bulan_23,
            'bulan_27'  => $request->bulan_27,
            'bulan_29'  => $request->bulan_29,
            'bulan_33'  => $request->bulan_33,
            'bulan_35'  => $request->bulan_35,
        ]);

        return redirect('/pricelists')->with('status', 'Daftar Harga Berhasil Disimpan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function show(Pricelist $pricelist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Daftar Harga Cicilan Motor";
        
        $motors = \App\Motor::all('id', 'nama_motor');

        $pricelist = Pricelist::find($id);

        return view('admin.pricelist.edit', compact('title', 'motors', 'pricelist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'uang_muka'     => 'required',
            'bulan_11'      => 'required',
            'bulan_17'      => 'required',
            'bulan_23'      => 'required',
            'bulan_27'      => 'required',
            'bulan_29'      => 'required',
            'bulan_33'      => 'required',
            'bulan_35'      => 'required',
        ]);
        $pricelist = Pricelist::find($id);
        
        $pricelist->update([
            'motor_id'  => $request->nama_kategori,
            'uang_muka' => $request->uang_muka,
            'diskon'    => $request->diskon,
            'bulan_11'  => $request->bulan_11,
            'bulan_17'  => $request->bulan_17,
            'bulan_23'  => $request->bulan_23,
            'bulan_27'  => $request->bulan_27,
            'bulan_29'  => $request->bulan_29,
            'bulan_33'  => $request->bulan_33,
            'bulan_35'  => $request->bulan_35,

        ]);

        return redirect('/pricelists')->with('status', 'Daftar Harga Behasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricelist $pricelist)
    {
        //
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder import_excel di dalam folder public
		$file->move('import_excel',$nama_file);
 
		// import data
		Excel::import(new PricelistImport, public_path('/import_excel/'.$nama_file));
 
		// alihkan halaman pricelists
		return redirect('/pricelists')->with('status', 'Import File Berhasil!');
	}
}
