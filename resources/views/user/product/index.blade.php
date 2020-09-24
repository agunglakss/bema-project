@extends('layouts.user.main') @section('content')

<div class="container mb-3">
    <div class="row">

        {{-- Breadcrumbs --}}
        <div class="col-md-12 mt-3 mb-5">
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
        
        {{-- Sidebar --}}
        <x-sidebar></x-sidebar>
        {{-- End Sidebar --}} 
        
        {{-- List Products --}}
        <div class="col-md-9 rounded-lg">
            <div class="row">

                <div class="col-md-12 rounded-lg mb-4">
                    <div class="box-header">
                        <div class="row align-items-center">

                            <div class="col-auto mr-auto">
                                <div class="title-box">
                                    @isset($kategori) {{ $kategori->nama_kategori }} @else Semua Motor @endisset
                                </div>
                            </div>

                            @isset($kategori)
                            <div class="col-auto text-right">
                                <a class="lihat-semua" href="{{ url('/products') }}">Lihat Semua</a>
                            </div>
                            @else @endisset

                        </div>
                    </div>
                </div>

                @forelse ($Motors as $motor)
                <div class="col-md-4 col-sm-6 col-6 mb-4">
                    <div class="box">
                        <a href="{{ url('/products').'/'.$motor->tipe->kategori->slug.'/'.$motor->tipe->slug.'/'.$motor->slug }}">
                            <div class="card">
                                <img class="card-img-top img-fluid" alt="" src="{{ asset('/storage/thumbnail').'/'.$motor->thumbnail}}" alt="">
                                <div class="card-block mt-2 mb-4 pl-3 pr-3">
                                    <h6 class="card-title text-truncate font-medium mb-2">{{ $motor->nama_motor }}</h6>
                                    <div class="title-dp mt-3">DP Mulai dari</div>
                                    <div class="harga-diskon font-bold">Rp 500,000</div>
                                    <div class="title-dp mt-2">Harga OTR</div>
                                    <span class="harga-asli font-medium">Rp {{ number_format($motor->harga_otr) }},-</span>
                                </div>
                                <button class="btn btn-box font-medium mb-3 ml-3 mr-3">Detail Motor</button>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-md-12 mb-5">
                    <h4>Motor Belum Tersedia.</h2>
                </div>
                @endforelse

            </div>
        </div>
        {{-- End List Products --}}

    </div>
</div>
@endsection