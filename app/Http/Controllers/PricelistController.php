<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PricelistImport;
use Illuminate\Http\Request;
use App\Pricelist;
use App\Motor;

class PricelistController extends Controller
{
    // form tambah pricelist
    public function create($slug)
    {
        $title = "Tambah Daftar Harga Cicilan Motor";

        $motor = Motor::select('id', 'nama_motor', 'slug')->where('slug', $slug)->first();
        if($motor == null) {
            abort('404');
        }

        return view('admin.pricelist.create', compact('title', 'motor'));
    }

    // tambah pricelist
    public function store(Request $request, $slug)
    {
        $motor = Motor::where('slug', $slug)->first();

        // validasi sebelum mengirimkan request ke database
        $request->validate([
            'motor_id'      => 'required',
            'uang_muka'     => 'required',
            'bulan_11'      => 'required',
            'bulan_17'      => 'required',
            'bulan_23'      => 'required',
            'bulan_27'      => 'required',
            'bulan_29'      => 'required',
            'bulan_33'      => 'required',
            'bulan_35'      => 'required',
        ]);

        if($motor->id == $request->motor_id) {
           
            Pricelist::create([
                'motor_id'  => $request->motor_id,
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
        } else {
            abort('404');
        }

        return redirect('/motor')->with('status', 'Daftar Harga Berhasil Disimpan.');

    }

    // form edit pricelist
    public function edit($slug, $id)
    {
        $title = "Edit Daftar Harga Cicilan Motor";
        
        $motor = Motor::where('slug', $slug)->first();
        // cek jika parameter yang di terima ada di database
        if($motor == null) {
            abort('404');
        }

        $pricelist = Pricelist::where('motor_id', $motor->id)->where('id', $id)->first();
        // cek jika parameter yang di url ada di database
        if($pricelist == null) {
            abort('404');
        }

        return view('admin.pricelist.edit', compact('title', 'motor', 'pricelist'));
    }

    // update pricelist
    public function update(Request $request, $slug, $id)
    {
       
        // cek jika parameter yang di terima ada di database
        $motor = Motor::where('slug', $slug)->first();
        if($motor == null) {
            abort('404');
        }

        $pricelist = Pricelist::where('motor_id', $motor->id)->where('id', $id)->first();
        if($pricelist == null) {
            abort('404');
        }
        
        $pricelist->update([
            'motor_id'  => $motor->id,
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

        return redirect('/motor'.'/'.$motor->slug.'/detail')->with('status', 'Daftar Harga Behasil Diubah.');
    }

    // hapus pricelist
    public function destroy($slug, $id)
    {
        $motor = Motor::where('slug', $slug)->first();
        if($motor == null) {
            abort('404');
        }
        
        $pricelist = Pricelist::where('motor_id', $motor->id)->where('id', $id)->delete();

        return redirect('/motor'.'/'.$motor->slug.'/detail')->with('status', 'Daftar Harga Berhasil Dihapus.');
    }

    // import execel
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
		$file->move('import_excel', $nama_file);
 
		// import data
		Excel::import(new PricelistImport, public_path('/import_excel'.'/'.$nama_file));
 
		// alihkan ke-halaman motor
		return redirect('/motor')->with('status', 'Import File Berhasil!');
    }
    
}
