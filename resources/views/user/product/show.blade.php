@extends('layouts.user.main') 

@section('content')
<div class="container mb-3">
    <div class="row">

        {{-- Breadcrumb --}}
        <div class="col-md-12 mt-3 mb-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Motor Matic</a></li>
                    <li class="breadcrumb-item active">Honda Beat</li>
                </ol>
            </nav>
        </div>
		{{-- End breadcrumb --}} 
		
		{{-- col-12 images --}}
        <div class="col-md-12 mb-4">
            <h3 class="font-bold">{{$motor->nama_motor}} - Rp {{ number_format($motor->harga_otr) }}</h1>
        </div>
		{{-- End col-12 images --}} 
		
		{{-- col-12 image and simulasi --}}
        <div class="col-md-12 mb-4 rounded-lg">
            <div class="row">

                {{-- list image --}}
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 mb-3" id="top-image">
                            <img class="rounded-lg top-image" src="{{ asset('/assets/img/products/honda-beat.jpg')}}" alt="">
                        </div>

                        @foreach (json_decode($motor->images) as $image )
                        <div class="col-md-2 col-2">
                            <img class="rounded-lg body-image" src="{{ asset('/storage/product-image').'/'.$image }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
				{{-- End list image --}} 
				
				{{-- simulasi motor --}}
                <div class="col-md-6 py-4 bg-white rounded-lg simulasi">
                    <form>
                        <h3> Simulasi Kredit Motor {{ $motor->nama_motor }}</h3>
                        <hr>

                        <div class="form-group mb-4">
                            <label for="tipe_motor" class="text-secondary-black font-medium">Kategori Motor</label>
                            <input type="text" class="form-control form-control" value="{{$motor->tipe->kategori->nama_kategori}}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label for="warna_motor" class="text-secondary-black font-medium">Warna Motor</label>
                            <select class="form-control  custom-select custom-select" style="text-transform: capitalize;" id="warna_motor">
								@foreach (json_decode($motor->warna) as $warnaMotor)
								<option  value="{{$warnaMotor}}">{{$warnaMotor}}</option>
								@endforeach
							</select>
                        </div>

                        <div class="form-group mb-5">
                            <label for="uang_muka" class="text-secondary-black font-medium">Uang Muka (DP)</label>
                            <select class="form-control custom-select custom-select" id="uang_muka" onchange="getPricelists()">
								<option value="">- Pilih Uang Muka (DP) -</option>
								@forelse ($pricelists as $pricelist)
								<option data-id="{{ $pricelist->motor_id }}" data-uang="{{ $pricelist->uang_muka }}" value="{{ $pricelist->uang_muka }}">Rp {{ number_format($pricelist->uang_muka) }}</option>
								@empty
								<option value="">Pilih Uang Muka</option>
								@endforelse
							</select>
                        </div>

                        <h4 class="mb-4 text-center text-blue" id="textUangMuka">Uang Muka (DP) Setelah Diskon Menjadi</h4>

                        <h1 class="mb-5 text-center text-orange font-bold" id="diskon">Rp</h1>

                        <div class="form-group mb-4">
                            <label for="tenor_cicilan" class="text-secondary-black font-medium">Cicilan Per Bulan / Tenor</label>
                            <select class="form-control custom-select custom-select" id="tenor_cicilan">
              				</select>
                        </div>

                        <h3 class="mt-5">Data Diri</h3>
                        <hr>

                        <div class="form-group mb-4">
                            <label for="nama" class="font-medium text-secondary-black">Nama</label>
                            <input type="text" class="form-control form-control" name="nama" placeholder="Isi dengan nama lengkap">
                        </div>

                        <div class="form-group mb-4">
                            <label for="alamat" class="font-medium text-secondary-black">Alamat</label>
                            <textarea class="form-control form-control" name="alamat" id="alamat" placeholder="Isi dengan alamat lengkap"></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="nomor_telepon" class="font-medium text-secondary-black">Nomor Telepon</label>
                            <input type="text" class="form-control form-control" name="nomor_telepon" placeholder="+62">
                        </div>

                        <button type="submit" class="btn btn-lg btn-orange w-100">AJUKAN SEKARANG</button>
                    </form>
                </div>
                {{-- end simulasi motor --}}

            </div>
        </div>
		{{-- end col-12 image and simulasi --}} 
		
		{{-- deskripsi --}}
        <div class="col-md-12 py-4 rounded-lg deskripsi">
            <h3>Informasi Motor</h3>
            <hr> {{ strip_tags($motor->deskripsi) }}
        </div>
        {{-- end deskripsi --}}

    </div>
</div>
@endsection