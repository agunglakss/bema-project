@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <div class="section-header-back">
            <a href="{{ url('/products/kategori-motor') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
         </div>
         <h1>Tambah Kategori Motor</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ url('/products/kategori-motor') }}">Kategori Motor</a></div>
            <div class="breadcrumb-item">Tambah Kategori Motor</div>
         </div>
      </div>
      
      <div class="section-body">
         @if (session('status'))
            <div class="alert alert-info alert-dismissible show fade">
               <div class="alert-body">
               <button class="close" data-dismiss="alert">
                  <span>&times;</span>
               </button>
               {{ session('status') }}
               </div>
            </div>
         @endif
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <form class="needs-validation" novalidate="" method="post" action="{{ url('/products/kategori-motor') }}">
                     @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="tipe-motor">Tipe Motor *</label>
                        <div class="col-sm-10">
                           <select class="form-control selectric" name="nama_tipe" required="">
                              <option value="">- Pilih Tipe Motor -</option>
                              @forelse ($tipeMotors as $tipeMotor)
                              <option value="{{ old('nama_tipe') ?? $tipeMotor->id }}">{{ $tipeMotor->nama_tipe }}</option> 
                              @empty
                                  <!-- Tidak ada data yang ditampilkan -->
                              @endforelse
                           </select>
                           <div class="invalid-feedback">
                              Tipe motor wajib di isi.
                            </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="nama_kategori">Kategori Motor *</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_kategori" placeholder="Isi dengan Honda Beat, Honda Vario dan lain-lain." {{ old('nama_kategori') }} required="">
                          <div class="invalid-feedback">
                            Kategori motor wajib di isi.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection