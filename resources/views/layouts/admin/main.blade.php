<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>{{ $title }}</title>

      @include('layouts.admin.source-header')
   </head>

   <body>
      <div id="app">
         <div class="main-wrapper">

            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
               @include('layouts.admin.navbar')
            </nav>

            <div class="main-sidebar">
               @include('layouts.admin.sidebar')
            </div>

            <div class="main-content">
               @yield('content')
            </div>

            <footer class="main-footer">
               @include('layouts.admin.footer')
            </footer>

         </div><!-- End Main Wrapper -->
      </div><!-- End App -->

      @include('layouts.admin.source-footer')
   </body>

</html>