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
            'nomor_telp'    => $request->nomor_telp,
        ]);

        // nomor whatsapp
        //$numberWhatsApp = $request->nomor_telp;

        // isi pesan
        //$message = "Hallo kami dari Spesialis Kredit Motor Honda Berikut daftar pesanan Anda";
        
        // kirim pesan
        //$this->sendWhatsApp($numberWhatsApp);

        return redirect('/');
        
    }

    public function sendWhatsApp($numberWhatsApp)
    {

        $numberToString = (string) $numberWhatsApp;
        $numberToString = $numberToString;
        $my_apikey = "7WQNDEOIXMD2FVCMQXQT";
        $destination = $numberToString;
        $message = "MESSAGE TO SEND";
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=". urlencode ($my_apikey);
        $api_url .= "&number=". urlencode ($destination);
        $api_url .= "&text=". urlencode ($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));
    
        // $numberToString = (string) $numberWhatsApp;
        // $numberToString = $numberToString;

        // $message = (string) $message;
        // $message = $message;

        // $my_apikey = "7WQNDEOIXMD2FVCMQXQT";
        // $destination = $numberToString;
        // $message = $message;
        // $api_url = "http://panel.rapiwha.com/send_message.php";
        // $api_url .= "?apikey=". urlencode ($my_apikey);
        // $api_url .= "&number=". urlencode ($destination);
        // $api_url .= "&text=". urlencode ($message);
        // $my_result_object = json_decode(file_get_contents($api_url, false));
    }
}
