<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Title Page
        $title = "Dashboard - Spesialis Kredit Motor Honda";
        
        // Total Jumlah Semua Motor
        $countMotor = Motor::all('id')->count();

        // Total Semua Motor Matic
        $countMotorMatic = Motor::where('kategori_id', 1)->count();

        // Total Semua Motor Bebek
        $countMotorBebek = Motor::where('kategori_id', 2)->count();

        // Total Semua Motor Sport
        $countMotorSport = Motor::where('kategori_id', 3)->count();

        return view('admin.dashboard.index', compact('title', 'countMotor', 'countMotorMatic', 'countMotorBebek', 'countMotorSport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
