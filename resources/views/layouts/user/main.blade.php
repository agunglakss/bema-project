<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
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
	
	@include('layouts.user.source-footer') 
	
	{{-- custom js --}}
    @yield('custom-js')

</body>

</html>