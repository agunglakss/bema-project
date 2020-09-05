@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <div class="section-header-back">
            <a href="{{ url('/banners') }}" class="btn btn-icon" title="Kembali"><i class="fas fa-arrow-left"></i></a>
         </div>
         <h1>Edit Banner Promo</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ url('/banners') }}">Daftar Banner</a></div>
            <div class="breadcrumb-item">Edit Banner Promo</div>
         </div>
      </div>
      
      <div class="section-body">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <form class="needs-validation" novalidate="" method="post" action="{{ url('/banners').'/'.$banner->id.'/edit' }}" enctype="multipart/form-data">
                     @method('patch')
                     @csrf
                     <div class="card-body">
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" name="image">Image Banner <span style="color: red;">*</span></label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file"  name="image" style="padding:7px 0 0 5px;">
                              <span class="text-small">Ukuran image harus 1440 x 360 pixel, maksimum image 3 MB</span>
                              <div class="invalid-feedback">
                                 Image wajib diisi.
                              </div>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" name="link">Link</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text"  name="link" placeholder="Jika link tidak ada, isi dengan simbol #" value="{{ $banner->link }}">
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" name="status">Status <span style="color: red;">*</span></label>
                           <div class="col-sm-10">
                              <select class="form-control selectric" name="status" required="">
                                 <option value="1" @if ($banner->status == 1) selected="selected" @endif>Active</option>
                                 <option value="0"  @if ($banner->status == 0) selected="selected" @endif>Deactive</option>
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