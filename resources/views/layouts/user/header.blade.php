{{-- Start Area Header --}}
<header>

   <div class="top-header">
      <div class="container">
         <div class="row">

            <div class="col-md-3">
               <a class="logo" href="#">
                  {{-- <img class="logo" src="{{ asset('logo.png') }}" alt=""> --}}
               </a>
            </div>

            <div class="col-md-6">
               <div class="form-search">
                  <form class="form-inline">
                     <input class="form-control form-control-lg" type="input" placeholder="Search by title or location" aria-label="Search">
                     <button class="btn ml-n5" type="submit"><i class="fa fa-search"></i></button>
                  </form>
               </div>
            </div>

            <div class="col-md-3">
               <ul>
                  <li class="text-right telp-email">
                     <a href="mailto:faturahmanbema22@gmail.com"><i class="fa fa-envelope"></i> faturahmanbema22@gmail.com</a>
                  </li>
                  <li class="text-right telp-email mt-1">
                     <a href="telp:081281318653"> <i class="fa fa-phone-square"></i> +6281281318653</a>
                  </li>
               </ul>
            </div>

         </div><!-- End row -->
      </div><!-- End container -->
   </div>
   {{-- End Top Header --}}

   <nav class="navbar navbar-expand-lg flex-column flex-md-row">
      <div class="container">

         <div class="navbar-nav-scroll">
            <ul class="navbar-nav flex-row">
               <li class="nav-item">
                  <a class="nav-link{{ request()->is('/') ? ' active' : ''  }}" href="{{ url('/') }}">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link{{ request()->is('products') ? ' active' : ''  }}" href="{{ url('product') }}">Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link{{ request()->is('schema') ? ' active' : ''  }}" href="{{ url('schema') }}">Schema Credit</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link{{ request()->is('about-us') ? ' active' : ''  }}" href="{{ url('about-us') }}">About Us</a>
               </li>
            </ul>
         </div>
         <a class="btn btn-whatsapp" href="#">
            <span class="icon-whatsapp"><i class="fa fa-whatsapp"></i></span>
            <span class="text-whatsapp">Tanya via Whatsapp</span>
         </a>

      </div>
   </nav>
   {{-- End Nav --}}

</header>
{{-- End Area Header  --}}