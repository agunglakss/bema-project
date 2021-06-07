{{-- Start Area Header --}}
<header>

    <div class="top-header py-2">
        <div class="container">
            <div class="telp-email">
                <a class="font-reguler" href="mailto:faturahmanbema22@gmail.com"><i class="fa fa-envelope"></i> faturahmanbema22@gmail.com</a> &nbsp;
                <a class="font-reguler" href="tel:+6281281318653"> <i class="fa fa-phone"></i> 081281318653</a>
            </div>
        </div>
    </div>
    {{-- end top header --}}

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img class="logo" src="{{ secure_asset('logo.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('/') ? ' active' : ''  }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('products') ? ' active' : ''  }}" href="{{ url('products') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('cara-pemesanan') ? ' active' : ''  }}" href="{{ url('cara-pemesanan') }}">Cara Pemesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('testimoni') ? ' active' : ''  }}" href="{{ url('testimoni') }}">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('tentang-kami') ? ' active' : ''  }}" href="{{ url('tentang-kami') }}">Tentang Kami</a>
                    </li>
                </ul>

                <form class="form-search ml-auto" action="{{ url('/products/search') }}">
                    <div class="input-group">
                        <input class="form-control" name="motor" type="input" placeholder="Cari Motor Honda di sini" aria-label="Search">
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