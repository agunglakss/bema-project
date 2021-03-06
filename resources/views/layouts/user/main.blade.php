<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? 'Kredit Motor Honda Murah | Spesialis Kredit Motor Honda' }}</title>
    <meta name="description" content="Dapatkan Motor Impian Anda Bersama Kami Unit Ready Proses Cepat Diskon Dp Hingga 3 Jt. Dp Dibayar Ketika Motor Tiba Dirumah 100% Aman." />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-barstyle" content="black-translucent"> 
	@include('layouts.user.source-header')
</head>

<body>
    @include('layouts.user.header')

    <section>
        @yield('content')
    </section>
    
    @include('layouts.user.footer') 
    <a class="btn btn-whatsapp" target="_BLANK" href="https://api.whatsapp.com/send?phone=6281281318653&text=Salam%20Satu%20Hati%0ASaya%20Bema%20dari%20spesialiskreditmotorhonda.com%0ABila%20ada%20pertanyaan%20untuk%20proses%20pembelian%20Motor%20Honda%20saya%20persilahkan"><i class="fa fa-whatsapp"> Whatsapp</i></a>
	@include('layouts.user.source-footer') 
	
	{{-- custom js --}}
    @yield('custom-js')

</body>

</html>