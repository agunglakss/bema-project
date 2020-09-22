{{-- Start Area Header --}}
<header>

    <div class="top-header py-2">
        <div class="container">
            <a class="telp-email font-medium" href="mailto:faturahmanbema22@gmail.com"><i class="fa fa-envelope"></i> faturahmanbema22@gmail.com</a> &nbsp;
            <a class="telp-email font-medium" href="telp:081281318653"> <i class="fa fa-phone"></i> +6281281318653</a>
        </div>
    </div>
    {{-- end top header --}}

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
    {{-- end nav --}}

</header>
{{-- End Area Header --}}