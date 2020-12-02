<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;
use App\Order;
use App\Pricelist;

class OrderController extends Controller
{
    public function index() 
    {
        $title = "Daftar Order";

        $orders = Order::with(['pricelist', 'motor'])->paginate(10);

        return view('admin.order.index', compact('title', 'orders'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'pricelist_id'  => 'required',
            'warna'         => 'required',
            'tenor'         => 'required',
            'nama'          => 'required',
            'alamat'        => 'required',
            'nomor_telp'    => 'required',
        ]);

        $pricelist = Pricelist::findOrFail($request->pricelist_id);
        
        Order::create([
            'order_id'      => rand(1, 999).time(),
            'pricelist_id'  => $pricelist->id,
            'warna'         => $request->warna,
            'tenor'         => $request->tenor,
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'nomor_telp'    => "62".$request->nomor_telp,
        ]);
        
        $motor = Motor::findOrFail($pricelist->motor_id);

        // nomor whatsapp
        $numberWhatsApp = "62".$request->nomor_telp;

        // isi pesan
        $text = "*Hallo, kami dari Spesialis Kredit Motor Honda.*\n" . "Berikut daftar pesanan Anda : \n\n" . $motor->nama_motor . "\nWarna : " . ucwords($request->warna) . "\nDP / Uang Muka : Rp " . number_format($pricelist->diskon) ."\nTenor " . $request->tenor . "\nBalas \"Ya\" untuk melanjutakan proses pemesanan.\nTerimakasih.";
        
        // kirim pesan
        $this->sendWhatsApp($numberWhatsApp, $text);

        return redirect('/');
        
    }

    public function sendWhatsApp($numberWhatsApp, $text)
    {
        $numberToString = (string) $numberWhatsApp;
        $resultNumberToString = $numberToString;

        $textToString = (string) $text;
        $resultTextToString = $textToString;

        $my_apikey = "YSGY62JGWGTBAOK8009U";
        $destination = $resultNumberToString;
        $message = $resultTextToString;
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=". urlencode ($my_apikey);
        $api_url .= "&number=". urlencode ($destination);
        $api_url .= "&text=". urlencode ($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));
    }
}
