{{-- Start Area Header --}}
<header>

    <div class="top-header">
        <div class="container">
            <a class="telp-email" href="mailto:faturahmanbema22@gmail.com"><i class="fa fa-envelope"></i> faturahmanbema22@gmail.com</a>
            <a class="telp-email" href="telp:081281318653"> <i class="fa fa-phone-square"></i> +6281281318653</a>
        </div>
        <!-- End container -->
    </div>
    {{-- End Top Header --}} {{--
    <div class="col-md-3">
        <a class="logo" href="#">
            <img class="logo" src="{{ asset('logo.png') }}" alt="">
        </a>
    </div> --}} {{--
    <div class="col-md-6">
        <div class="form-search">
            <form class="form-inline">
                <input class="form-control form-control-lg" type="input" placeholder="Search by title or location" aria-label="Search">
                <button class="btn ml-n5" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div> --}}

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
		<div class="container">
			<a class="navbar-brand" href="{{ url('/') }}"><img class="logo" src="{{ asset('logo.png') }}" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
	
			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
                        <a class="nav-link{{ request()->is('/') ? ' active' : ''  }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('products') ? ' active' : ''  }}" href="{{ url('products') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('schema') ? ' active' : ''  }}" href="{{ url('schema') }}">Schema Credit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('about-us') ? ' active' : ''  }}" href="{{ url('about-us') }}">About Us</a>
                    </li>
				</ul>

				<form class="form-search">
					<div class="input-group">
						<input class="form-control" type="input" placeholder="Cari Motor Honda di sini" aria-label="Search">
						<div class="input-group-append">
							<button class="btn bg-red ml-n0" type="submit"><i class="fa fa-search"></i></button>
						 </div>
					</div>
				</form>
				

			</div>
		</div>
    </nav>
    {{-- End Nav --}}

</header>
{{-- End Area Header --}}