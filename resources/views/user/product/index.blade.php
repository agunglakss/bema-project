@extends('layouts.user.main')

@section('content')

<div class="container mb-3">
	<div class="row">

		{{-- Breadcrumbs  --}}
		<div class="col-md-12 mt-3 mb-5 ">
		  <nav aria-label="breadcrumb ">
        <ol class="breadcrumb ">
          <li class="breadcrumb-item active"><a href="/">Home</a></li>
          @if (isset($kategori))
          <li class="breadcrumb-item active">
            {{ $kategori->nama_kategori }}
          </li class="breadcrumb-item active">
          @elseif (isset($tipe))
          <li class="breadcrumb-item active">
            {{ $tipe->nama_tipe }}
          </li>
          @else
          <li class="breadcrumb-item active">
            Semua Produk
          </li>
          @endif
        </ol>
			</nav>
		</div>
    {{-- End Breadcrumbs --}}

    {{-- Sidebar  --}}
    <x-sidebar></x-sidebar>
    {{-- End Sidebar  --}}

    {{-- List Products --}}
    <div class="col-md-9 mb-4">
      <div class="row">

        <div class="col-md-12 mb-4">
          <div class="box-header">
            <div class="row align-items-center">
              <div class="col-auto mr-auto ">
                <div class="title-box ">
                  @isset($kategori)
                    {{ $kategori->nama_kategori }}
                  @else
                    Semua Motor
                  @endisset
                </div>
              </div>

              @isset($kategori)
              <div class="col-auto text-right">
                  <a class="lihat-semua" href="{{ url('/product') }}">Lihat Semua</a>
              </div>
              @else
              @endisset
              
            </div>
          </div>
        </div>

        @forelse ($Motors as $motor)
          <div class="col-md-4 mb-5">
            <div class="box">
              <a href="{{ url('/product').'/'.$motor->tipe->kategori->slug.'/'.$motor->tipe->slug.'/'.$motor->slug }}">
                <div class="card">
                  <img class="card-img-top img-fluid" alt="" src="{{ asset('/img-products').'/'.$motor->thumbnail}}" alt="">
                  <div class="card-block mt-3 mb-4 pl-3 pr-3">
                    <h6 class="card-title text-truncate mb-2">{{ $motor->nama_motor }}</h6>
                    <div class="title-dp">DP Mulai dari</div>
                    <div class="harga-diskon">Rp</div>
                    <div class="title-dp">Harga OTR</div>
                    <span class="harga-asli">Rp {{ number_format($motor->harga_otr) }},-</span>
                  </div>
                  <button class="btn btn-box mb-3 ml-3 mr-3">Ajukan Kredit</button>
                </div>
              </a>
            </div>
          </div>
        @empty
          <div class="col-md-12 mb-5"> 
            <h4>Data Tidak Tersedia!</h2>
          </div>
        @endforelse

      </div>
    </div>
    {{-- End List Products --}}

  </div>
</div>    
@endsection