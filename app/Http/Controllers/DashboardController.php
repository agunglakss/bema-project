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
}
