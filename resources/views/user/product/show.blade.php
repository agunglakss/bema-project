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
      <h1 class="font-weight-bold">{{$motor->nama_motor}}</h1>
    </div>
    {{-- End col-12 images --}}

    {{-- col-12 --}}
    <div class="col-md-12 mb-4">
      <div class="row">

        {{-- list image --}}
        <div class="col-md-6 mb-3">
          <div class="row">
            <div class="col-md-12 mb-3" id="top-image">
              <img class="rounded-lg top-image" src="{{ asset('/assets/img/products/honda-beat.jpg')}}" alt="">
            </div>
            @foreach (json_decode($motor->images) as $image )
            <div class="col-md-4 col-4 ">
              <img class="rounded-lg body-image" src="{{ asset('img-products').'/'.$image }}" alt="">
            </div>
            
            @endforeach
          </div>
        </div>
        {{-- End list image --}}

        {{-- Data motor --}}
        <div class="col-md-6 py-4 rounded-lg calculation">
          <form>
            <div class="form-group mb-4">
              <label for="tipe_motor" class="font-weight-bold text-secondary-black">Kategori Motor</label>
              <input type="text" class="form-control form-control-lg" value="{{$motor->tipe->kategori->nama_kategori}}" readonly>
            </div>
            <div class="form-group mb-4">
              <label for="warna_motor" class="font-weight-bold text-secondary-black">Warna Motor</label>
              <select class="form-control  custom-select custom-select-lg" style="text-transform: capitalize;" id="warna_motor">
                @foreach (json_decode($motor->warna) as $warnaMotor)
                <option  value="{{$warnaMotor}}">{{$warnaMotor}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mb-5">
              <label for="uang_muka" class="font-weight-bold text-secondary-black">Uang Muka</label>
              <select class="form-control custom-select custom-select-lg" id="uang_muka" onchange="getPricelists()">
                <option value="">Pilih Uang Muka</option>
                @forelse ($pricelists as $pricelist)
                <option data-id="{{ $pricelist->motor_id }}" data-uang="{{ $pricelist->uang_muka }}" value="{{ $pricelist->uang_muka }}">Rp {{ number_format($pricelist->uang_muka) }}</option>
                @empty
                <option value="">Pilih Uang Muka</option>
                @endforelse
              </select>
            </div>
            <h4 class="mb-4 text-center font-weight-bold text-blue" id="textUangMuka">Uang Muka Setelah Diskon Menjadi</h4>

            <h1 class="mb-5 text-center font-weight-bold text-orange" id="diskon">Rp ,-</h1>

            <div class="form-group mb-4">
              <label for="tenor_cicilan" class="font-weight-bold text-secondary-black">Tenor Cicilan</label>
              <select class="form-control custom-select custom-select-lg" id="tenor_cicilan">
              </select>
            </div>

            <div class="form-group mb-4">
              <label for="nama" class="font-weight-bold text-secondary-black">Nama</label>
              <input type="text" class="form-control form-control-lg" name="nama">
            </div>

            <div class="form-group mb-4">
              <label for="alamat" class="font-weight-bold text-secondary-black">Alamat</label>
              <textarea class="form-control form-control-lg" name="alamat" id="alamat" ></textarea>
            </div>

            <div class="form-group mb-4">
              <label for="nomor_telepon" class="font-weight-bold text-secondary-black">Nomor Telepon</label>
              <input type="text" class="form-control form-control-lg" name="nomor_telepon">
            </div>

            <button type="submit" class="btn btn-lg btn-orange w-100">Ajukan Kredit Motor</button>
          </form>
        </div>
        {{-- End data motor --}}

      </div>
    </div>
    {{-- End col-12 --}}

  </div>
</div>
@endsection
