@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <div class="section-header-back">
            <a href="{{ url('/banners') }}" class="btn btn-icon" title="Kembali"><i class="fas fa-arrow-left"></i></a>
         </div>
         <h1>Tambah Banner Promo</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ url('/banners') }}">Daftar Banner</a></div>
            <div class="breadcrumb-item">Tambah Banner Promo</div>
         </div>
      </div>
      
      <div class="section-body">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <form class="needs-validation" novalidate="" method="post" action="{{ url('/banners') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" name="image">Image Banner <span style="color: red;">*</span></label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file"  name="image" required="" style="padding:7px 0 0 5px;">
                              <span class="text-small">Ukuran image harus 1440 x 360 pixel, maksimum image 3 MB</span>
                              <div class="invalid-feedback">
                                 Image wajib diisi.
                              </div>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" name="link">Link</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text"  name="link" placeholder="Jika link tidak ada, isi dengan simbol #" value="#">
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" name="nama_kategori">Status <span style="color: red;">*</span></label>
                           <div class="col-sm-10">
                              <select class="form-control selectric" name="status" required="">
                                 <option value="1">Active</option>
                                 <option value="0">Deactive</option>
                              </select>
                           </div>
                        </div>
                     </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type='submit'>Simpan</button>
                    </div>
                  </form>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection